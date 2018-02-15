<?php
class User_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    
    protected function convertToYmd($data) {
        $data = str_replace(array("/", '.'), array("-"), $data);
        $newData = explode("-", $data);
        $finalData = $newData[2] . "-" . $newData[1] . "-" . $newData[0];
        return $finalData;
    }

    public function logar($data){
        $matricula = $data['matricula'];
        $nascimento = $this->convertToYmd($data['dataDeNascimento']);

        $this->db->select('idUsuario, matricula, dataDeNascimento, nomeCompleto, estado, email');
        $this->db->from('users');
        $this->db->where('matricula', $matricula);
        $this->db->where('dataDeNascimento', $nascimento);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function getAvailableStates(){
        $this->db->select("estado");
        $this->db->distinct();
        $this->db->from("users");
        $this->db->where('estado is NOT NULL',NULL,false);
        $query = $this->db->get();
        return $query->result();
        
    }

    public function updatedAt($idUsuario) {
        $data['idUsuario'] = $idUsuario;
        $data['updated_at'] = date("Y-m-d H:i:s");

        $this->db->where('idUsuario', $idUsuario);
        $this->db->update('users', $data);
    }
    
}