<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    protected $header;

    public function __construct() {
        parent::__construct();
        $this->today = date("Y-m-d");
        $this->encerramento = "2018-02-13";

        $this->output->enable_profiler(false);
        $data['user'] = $this->header;
    }

    public function index() {
        if ($this->input->post('login')) {
            $data['matricula'] = $this->input->post("matricula");
            $data['dataDeNascimento'] = $this->input->post("data-de-nascimento");

            $this->load->model("user_model");
            $user = $this->user_model->logar($data);
            
            if ($user) {
                $dataDeNascimento = new DateTime($user->dataDeNascimento);
                $nascimento = $dataDeNascimento->format("d-m-Y");
                $data = array(
                    'nome' => $user->nomeCompleto, 
                    'email' => $user->email, 
                    'matricula' => $user->matricula, 
                    'estado' => $user->estado, 
                    'dataDeNascimento' => $nascimento, 
                    'logged' => true
                );
                
                $this->user_model->updatedAt($user->idUsuario);
                $this->session->set_userdata($data);

                redirect(base_url('/figurinhas/profile'));
                
            } else {
                #echo "erro";
                redirect(base_url('login/erro'));
            }
        } else {
            $this->load->view('header_view', $this->header);
            $this->load->view('form_login_view');
            $this->load->view('footer_view');
        }
    }

    public function logout() {
        /**
         * Sessions Admins
         */
        $this->session->unset_userdata('nome');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('dataDeNascimento');
        $this->session->unset_userdata('logged');
        $this->session->unset_userdata('level');
        $this->session->sess_destroy();

        redirect('/', 'refresh');
    }

    public function erro() {
        $encerramento = new DateTime($this->encerramento);
        $data['encerramento'] = $encerramento->format("dd/mm/YYYY");
        
        $this->load->view('header_view');
        $this->load->view('login_erro_view', $data);
        $this->load->view('footer_view');
    }

}
