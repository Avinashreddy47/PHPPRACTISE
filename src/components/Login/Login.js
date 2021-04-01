import React,{ useState } from 'react';
import { useHistory} from 'react-router-dom';
import axios from 'axios';
import './Login.css'
import Template from '../Modals/Template';
const Login=()=>{
  const initialState = {
    email: "",
    password: "",
  };

  const history=useHistory();
  const [user, setUser] = useState(initialState);
  const [modal, setModal] = useState({
    show1: false,
    ModalTitle: "",
    ModalBody: "",
  });
   const onChange = async (e) => {
    const name = e.target.name;
    const value = e.target.value;

    setUser({ ...user, [name]: value });
  };
  const signup=async()=>{
   
  };
  const login = async () => {
    var formData = new FormData();
    var test = user.email;
    localStorage.setItem("email",test);
    localStorage.setItem("test", JSON.stringify(test)); 
    var testify=user.password;
    localStorage.setItem("testify",JSON.stringify(testify));

    try{
  const json = JSON.stringify({ email: user.email,
                                password:user.password });
   const res = await axios.post('http://localhost:8010/Desktop/codeigniter-galleryproject/index.php/login', json, {
   headers: {
    // Overwrite Axios's automatically set Content-Type
    'Content-Type': 'application/json'
   }
   });
  // console.log(res);
      if(res.status!==200)
      {
        setUser(initialState);
        setModal({
          show1:true,
          ModalTitle:'login failed',
          ModalBody:'please login/register again',
        });
      }
      else{             
        const  fData=new FormData();
        fData.append("email",user.email);
        const allImages = await axios({
          url: "http://localhost:8010/Desktop/codeigniter-galleryproject/index.php/images",
          method: "post",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          data: fData,
        });
       console.log(allImages.data.data);
       localStorage.setItem('email',user.email);
         history.push({
         pathname: "/upload",
         state :{
           email:user.email,
           password:user.password,
           images: allImages.data.data,
         },
        });
    }
  }
  catch{

  }
  };
//   const onClickSignIn = () => {
//     history.push("/login");
// }

const onClickSignup = () => {
    history.push("/Signup");
}
  return (
   
    <div className="body"> 
        <h1 className="h1">Gallery view Project</h1>        
        <h1 className="h1">Login page</h1>
        <div className="login">
        {/* <label>Username</label>
        <input type="text" name="name" placeholder="name" onChange={this.onChange}/> */}
      
      {/* <label for="login">Email</label> */}
      Email
      <input id="uname" type="text" name="email" placeholder="email" onChange={onChange}/>
      Password
      <input  id="pass" type="password" name="password" placeholder="password"  onChange={onChange}/>
      <input type="button" id="log"  value="login"  onClick={login}/>
      <input type="button" id="log" value="signup" onClick={onClickSignup}/>
      <Template
        show1={modal.show1}
        setIsopen={setModal}
        ModalTitle={modal.ModalTitle}
        ModalBody={modal.ModalBody}
      />
    </div>
    </div>

  );
};

export default Login;
