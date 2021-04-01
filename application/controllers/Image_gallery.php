<?php

require APPPATH.'libraries/REST_Controller.php';

class Image_gallery extends REST_Controller{

  public function __construct(){

    parent::__construct();
    //load database
    $this->load->database();
    $this->load->model(("Imagegallery_model"));
    $this->load->helper("security");
  }
  public function login_post(){
    // collecting form data inputs
    $stream_clean = $this->security->xss_clean($this->input->raw_input_stream);
    $data = json_decode($stream_clean);

    // echo $stream_clean;
    $email = isset($data->email) ? $data->email : "";
    $password = isset($data->password) ? $data->password : "";
    if(!empty($email) && !empty($password))
    {
      // all values are available
      $this->load->library('Authorization_Token');
      $userdetails = array(
          "email" => $email,
          "password" => $password
      );
        $token_data['email']=$email;
        //print_r("hello");
        //print_r($this->authorization_token->userData());
        //exit;
        $tokens=$this->authorization_token->generateToken($token_data);
        if($this->Imagegallery_model->validate_user($userdetails))
        {
          $this->response(array(
            "status" => 1,
            "message" => "user details are valid you can continue",
            "token"=>$tokens
          ), REST_Controller::HTTP_OK);
        }
        else{
          $this->response(array(
            "status" => 0,
            "message" => "Failed to fetch user credentials try to login again"
          ), REST_Controller::HTTP_OK);
        }
      }
      else{
        // we have some empty field
        $this->response(array(
          "status" => 0,
          "message" => "All fields are needed"
        ), REST_Controller::HTTP_OK);
      }
    }

    public function signup_post(){
      //function to signin the user

    $data=json_decode($this->security->xss_clean($this->input->raw_input_stream));
    // echo $stream_clean;
    $username = isset($data->username) ? $data->username : "";
    $email = isset($data->email) ? $data->email : "";
    $password = isset($data->password) ? $data->password : "";
    if(!empty($username) && !empty($email) && !empty($password))
    {

      // all values are available
      $userdetails = array(
          "username" => $username,
          "email" => $email,
          "password" => $password
      );
        $token_data['username']=$username;
        $token_data['email']=$email;
        if($this->Imagegallery_model->insert_user($userdetails))
        {
          $this->response(array(
            "status" => 1,
            "message" => "user details are sucessfully registered",
          ), REST_Controller::HTTP_OK);
        }
        else{
          $this->response(array(
            "status" => 0,
            "message" => "user details already exists",
          ), REST_Controller::HTTP_OK);
        }
      }
      else{
        // we have some empty field
        $this->response(array(
          "status" => 0,
          "message" => "All fields are needed"
        ), REST_Controller::HTTP_OK);
    }
  }
}
 ?>
