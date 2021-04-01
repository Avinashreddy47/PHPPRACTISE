<?php

class Imagegallery_model extends CI_Model{

  private $table="users";

  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

   public function validate_user($data = array()){

       $this->db->get_where($this->table,array('email'=>$data['email']));
       if(($this->db->affected_rows()>=1)){
         return true;
       }
       else{
         return false;
       }
   }
   public function insert_user($data=array()){
    $this->db->get_where($this->table,array('email'=>$data['email']));
    if(($this->db->affected_rows()>=1)){
      return false;
    }
    else{
      return $db->insert($data);
    }
   }


   
}

 ?>
