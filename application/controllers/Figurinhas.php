<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, X-Auth-Token');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

use \Firebase\JWT\JWT;

class Figurinhas extends CI_Controller {
	protected $user;
	protected $key = "chavedeacesso";
	protected $numOfCards = 640;
	protected $myCards = [];
	protected $matricula = "";
	//protected $matricula = 10344;
	//protected $matricula = 664323;
	protected $header;
	
	public function __construct(){
		parent::__construct();

		if(!$this->session->userdata("logged")){
			redirect(base_url('login'));
		}

		$this->matricula = $this->session->userdata("matricula");

	}
	
	public function profile(){
		$this->load->view('header_view',$this->header);
		$this->load->view('profile_view');
		$this->load->view('footer_view');
	}

	public function trocadores($estado=NULL){
		$this->output->enable_profiler(false);

		$this->load->model("user_model");
		$data['states'] = $this->user_model->getAvailableStates();

		$this->load->model("cards_model");
		$data['exchangers'] = $this->cards_model->with_repeated_cards($estado,$this->matricula);
		$wanted_cards =  $this->cards_model->wanted_cards($this->matricula);
		if($wanted_cards){
			$data['wanted_cards'] = $wanted_cards->wanted_cards;
		} else {
			$data['wanted_cards'] = "";
		}

		$this->load->view('header_view');
		$this->load->view('exchangers_view',$data);
		$this->load->view('footer_view');
	}
	

	public function repetidas()
	{
		$this->load->model("cards_model");
		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$repeated_cards =  implode(",", $this->input->post("repetidas"));
			$this->cards_model->insert_repeated_cards($this->matricula, $repeated_cards);
		}
		$data['user']  = $this->cards_model->get_user($this->matricula);
		$data['cards'] = $this->cards_model->repeated_cards($this->matricula);

		$this->load->view('header_view');
		$this->load->view('for_exchange',$data);
		$this->load->view('footer_view');
	}

	public function procurando()
	{
		$this->load->model("cards_model");
		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$wanted_cards =  implode(",", $this->input->post("repetidas"));
			$this->cards_model->insert_wanted_cards($this->matricula, $wanted_cards);
		}
		$data['user']  = $this->cards_model->get_user($this->matricula);
		$data['cards'] = $this->cards_model->wanted_cards($this->matricula);

		$this->load->view('header_view');
		$this->load->view('looking_for',$data);
		$this->load->view('footer_view');
	}
	
	public function getLookingForCards($matricula){
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, X-Auth-Token');
		header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		
		$this->load->model("cards_model");
		$cards = $this->cards_model->wanted_cards($matricula);
		$data['cards'] = array("wanted_cards"=>explode(",",$cards->wanted_cards));
		
		$key = $this->key;
        $token = array(
            "iss" => "trocafigurinhas",
            "iat" => time(),
            "data"=>$data['cards']
        );
		$json = json_encode($data['cards']);
		echo $json;
        #$jwt = JWT::encode($token, $key);
        #echo $jwt;
	}

	public function repetidas_da($name)
	{
		for($i=0; $i<count($this->participantes);$i++){
			if($name==$this->participantes[$i]['nome']){
				$this->user = $this->participantes[$i]['nome'];
				$this->myCards = $this->participantes[$i]['repetidas'];
				$data['user'] = $this->participantes[$i]['nome'];
				$data['departamento'] = $this->participantes[$i]['departamento'];
				$data['email'] = $this->participantes[$i]['email'];
			}
		}
		$cards = "";
		sort($this->myCards);
		for($i=1; $i <= count($this->myCards)-1; $i++) {
			$cards.="<label class='wrapper-card'><input type='checkbox'";
			if(in_array($this->myCards[$i], $this->minhasRepetidas)){
				$cards.=" checked='checked'";
			}
			$cards.="><div class='card-background'><span class='checkmark'>" . $this->myCards[$i] . "</span></div></label>";
		}

		$data['content'] = $cards;
		$data['myCards'] = $this->minhasRepetidas;
		$data['user'] = $this->user;

		$this->load->view('header_view',$this->header);
		$this->load->view('repeated_cards',$data);
		$this->load->view('footer_view');
	}

	
	public function generate_random_cards($amount){
		$cards = [];
		$mycards = "";
		for($i=1; $i<$amount;$i++){
			$cards[]=rand(1,640);
		}
		sort($cards);
		foreach($cards as $card){
			$mycards .= $card . ",";
		}
		print(trim($mycards,','));
	}

	private function getAvatars(){
		ini_set('max_execution_time', 36000);
		$this->load->model("cards_model");
		$results = $this->cards_model->get_users();
		foreach ($results as $result) {
				$imgName = str_replace(array('@indracompany.com','@indra.es'),"", $result->email);
				$url = 'https://www.indraweb.net/UserImages/' . $imgName . '_MThumb.jpg';
				$img = './images/' . $imgName . '_MThumb.jpg';

				echo "<img alt='" . $result->idUsuario . "' src='" . $url . "'  width='72' height='72' style='border:1px solid gray'>";

				/*try{
					file_put_contents($img, file_get_contents($url));
					echo "<img alt='" . $url . "' src='" . $url . "' width='72'>";
				} catch (Exception $e){
					echo $e->getMessage(), "\n";
				}*/

				/*try{
					$content = file_get_contents($url);
					$fp = fopen($img,'w');
					fwrite($fp,$content);
					fclose($fp);
					echo "<img alt='" . $imgName . "' src='". $img ."' width='72' height='72' style='border:1px solid gray'>";
				} catch (Exception $e){
					echo $e->getMessage(), "\n";
				}*/
				
			
		}
	}

}
