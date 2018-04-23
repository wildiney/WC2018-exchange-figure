<?php
class Cards_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function get_user($matricula){
        $this->db->select('users.idUsuario,users.matricula,users.nomeCompleto, users.email, users.cidade, users.area, users.estado');
        $this->db->from('users');
        $this->db->where('users.matricula',$matricula);
        $query = $this->db->get();
        return $query->row();
    }

    public function get_users(){
        $this->db->select("idUsuario,email");
        $this->db->from("users");
        $this->db->where('email is NOT NULL',NULL, FALSE);
        $this->db->order_by('idUsuario');
        $query = $this->db->get();
        return $query->result();
    }

    public function wanted_cards($matricula){
        $this->db->select('cards.wanted_cards');
        $this->db->from('cards');
        $this->db->where('cards.matricula',$matricula);
        $query = $this->db->get();
        return $query->row();
    }
    
    public function repeated_cards($matricula){
        $this->db->select('cards.repeated_cards, cards.matricula');
        $this->db->from('cards');
        $this->db->where('cards.matricula',$matricula);
        $query = $this->db->get();
        return $query->row();
    }

    public function with_repeated_cards($estado,$exception=NULL){
        $this->db->select('cards.idRC,users.idUsuario,users.matricula,cards.repeated_cards,users.nomeCompleto, users.email, users.cidade, users.area, users.estado');
        $this->db->from('cards');
        $this->db->join('users','users.matricula = cards.matricula');
        if(isset($estado)&& !is_null($estado)){
            $this->db->where("users.estado",$estado);
        }
        if(isset($exception)&&!is_null($exception)){
            $this->db->where("users.matricula <>",$exception);
        }
        $this->db->where("cards.repeated_cards is NOT NULL",NULL, FALSE);
        $query = $this->db->get();
        return $query->result();
    }

    public function request($matricula){
        $this->db->select('matricula');
        $this->db->from('cards');
        $this->db->where('matricula',$matricula);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function insert_wanted_cards($matricula, $cards){
        if($this->request($matricula)){
            $this->db->set('wanted_cards',$cards);
            $this->db->where('matricula',$matricula);
            $query = $this->db->update('cards');
        } else {
            $this->db->set('wanted_cards',$cards);
            $this->db->set('matricula',$matricula);
            $query = $this->db->insert('cards');
        }
        return $query;
    }

    public function insert_repeated_cards($matricula, $cards){
        if($this->request($matricula)){
            $this->db->set('repeated_cards',$cards);
            $this->db->where('matricula',$matricula);
            $query = $this->db->update('cards');
        } else {
            $this->db->set('repeated_cards',$cards);
            $this->db->set('matricula',$matricula);
            $query = $this->db->insert('cards');
        }
        return $query;
    }
}