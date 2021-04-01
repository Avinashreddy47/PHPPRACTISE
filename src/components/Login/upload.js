import React, {useState} from 'react';
import {useLocation,  useHistory} from "react-router-dom";
import axios from 'axios';
import './upload.css';
import './Login.js'

const Upload = () => {
    const history=useHistory();
    const location=useLocation();
   //  const [images,setImages] = useState([]);
    const [image, setImage] = useState(null);
    const[images,setImages]=useState(location.state.images)
    const [sepImage, setSepImage] = useState("");
    //Handlers
    const onsubmit = async () => {
        //form data stores key,values
        var formData = new FormData();
      formData.append("image", image);
      var test = localStorage.getItem("email");
      formData.append("email", test);
      const res=await axios({
        url: "http://localhost:8010/Desktop/codeigniter-galleryproject/index.php/images/add",
        method: "post",
        headers: {
          "Content-Type": "application/form-data",
        }, data: formData,
      });
      setImages([...images,res.data.data]);
      console.log(res.data.data);

    //  console.log(res.data.url);
    };
      const logout = () => {
        localStorage.clear();
        history.push("/");
      };
  return (
    <body>
    <div >
      <div className="">
    <ul>
    <li><a > 
     <button className="border" type="submit" name="logout" placeholder="logout" onClick={logout}>Logout
      </button>
      </a>
      </li> 
      <li>
        <a>   
        <label className="image_upload" for="Imageupload" >Image Upload
        </label>
     <input className="choose_file" type="file" name="image"
              value={sepImage} onChange={(e) => {
                setSepImage(e.target.value);
                setImage(e.target.files[0]);
              }}>
      </input>      
      </a>
      </li> 
      <button className="upload" type="submit" name="upload file" placeholder="upload file" onClick={onsubmit}>Upload File</button>
      </ul>
      <section>

      </section>
      </div>
<div className="row small-up-2 medium-up-3 large-up-4">
    <div className="box">
        {
          
           images.length>0?
               images.map((url,index)=>(
  
                    <img src={`data:image/${url.extension};base64,${url.imagedata}`} className="photo" alt="image" />
            ))
            :
            <h3 style={{color:"blue",text_align:"center"}}>Please Add Images to display</h3>
            }; 
    </div>  
        </div>
        </div>
        </body>
  );
};
export default Upload;