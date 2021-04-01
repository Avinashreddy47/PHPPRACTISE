import React, { useState } from 'react';
import Modal from "react-bootstrap/Modal";
import Button from "react-bootstrap/Button";
import "bootstrap/dist/css/bootstrap.min.css";
// import { set } from 'local-storage';
// import ModalBody from "react-bootstrap/ModalBody";
// import ModalHeader from "react-bootstrap/ModalHeader";
// import ModalFooter from "react-bootstrap/ModalFooter";
// import ModalTitle from "react-bootstrap/ModalTitle";
    const Template=({show1,setIsopen,ModalTitle,ModalBody})=> {
        // const [isopen,setIsopen]=useState(false);
        // const showModal=()=>{
        //     setIsopen({show1:true,ModalTitle,ModalBody});
        // };
        const HideModal=()=>{
           setIsopen({show1:false,ModalTitle,ModalBody});
        };
        return (
            <div>
            <Modal show={show1} onHide={HideModal}>
                <Modal.Header>
                    <Modal.Title>{ModalTitle}</Modal.Title>
                </Modal.Header>
                <Modal.Body>
                {ModalBody}
                </Modal.Body>
                <Modal.Footer>
                    <Button style={{
            backgroundColor: "#245435",
            color: "white",
            fontWeight: "bold",
          }} onClick={HideModal}>cancel</Button>
                    {/* <button>Save</button> */}
                </Modal.Footer>
            </Modal>
            </div>
        )
};

export default Template
