<?php

require_once APPPATH . 'controllers/Base_controller.php';
class Image_controller extends Base_controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Image_model');
        $this->load->helper('security');
    }
    public function getImages_post(){
        $result=array();
        $email=$this->security->xss_clean($this->input->post("email"));
        $this->load->library(array('form_validation'));
        $this->form_validation->set_rules("email","Email","required|valid_email");
        if($this->form_validation->run()==FALSE){
            $this->responsegenerator([],'image retreival failed','false');
        }
        else{
        $result=$this->Image_model->getImages($email);
        $res=$this->responsegenerator($result,'Images are succesfully retreived','true');
        $this->response($res,REST_Controller::HTTP_OK);

        // $this->response($res,200);
        // print_r($result);
        // $arr=array();
        // print_r($result);
        // $arr['email']=$result['email'];
        // $arr['extension']=$result['extension'];
        // $arr['imagedata']=$result['imagedata'];
        return $res;
        }
    }
    public function addImage_post(){
        $filedata=array();
        $filename=$_FILES['image']['name'];
        $tempname=$_FILES['image']['tmp_name'];
        $filedata['email']=$_POST['email'];
        $type=strtolower(pathinfo($filename,PATHINFO_EXTENSION));
        $filedata['extension']=$type;
        if($type==='png' || $type==="jpg" || $type==="jpeg"){
            $imageData=base64_encode(file_get_contents($tempname));
            $filedata['imagedata']=$imageData;
            // echo json_encode($filedata);
            $res=$this->Image_model->addImage(($filedata));
            if($res)
            {
                $res=$this->responsegenerator($filedata,'successfully inserted an image','true');
                $this->response($res,REST_Controller::HTTP_OK);
            
            }
            else{
                 $res=$this->responsegenerator([],'failed to insert an image','false');
                 $this->response($res,REST_Controller::HTTP_NOT_FOUND);
            }
        }
        else{
            $res=$this->responsegenerator([],'please enter valid extensions','false');
            $this->response($res,REST_CONTROLLER::HTTP_NOT_FOUND);
        }
    }
}

?>