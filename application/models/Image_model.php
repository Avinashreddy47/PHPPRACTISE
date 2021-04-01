<?php

class Image_model extends CI_model{

    public $table='images';
    public function __construct(){
        parent::__construct();
        $this->load->database();
      }


    function addImage($data) {
    
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }

    function getImages($email) {
        $res= $this->db->get_where($this->table,array('email' => $email))->result();
        return $res;
    }
}

?>