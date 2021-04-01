<?

require APPPATH.'libraries/REST_Controller.php';

class Base_controller extends REST_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('Authorization_Token');
    }

    function responsegenerator($data,$message,$result){
        $results=array();
        $results['message']=$message;
        $results['result']=$result;
        $results['data']=$data;
        return $results;
    }

    function validateEmail($email) {

        $email=filter_var($email,FILTER_SANITIZE_EMAIL);
        return filter_var($email,FILTER_VALIDATE_EMAIL);

    }

    function invalidEmailResponse() {
        return $this->responsegenerator("Email should be valid ","false",[]);
    }

    function validatePassword($pass) {
        if(strlen($pass)<8)
        {
            return $this->responsegenerator("password should be atleast 8 charecters","false",[]);
        }
        return true;
    }
}
?>
