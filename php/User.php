<?php
     abstract class User{
        protected $mail;
        protected  $id; 
        /*
        it starts with a letter indentifying whats it's role
        then a randomly generated number 
        */
        protected $password; //encrypted
        protected $telefono; //optional  
    
        protected randomNumber();
        protected encryptPassword(){
            $password=hash("sha256",password);
        }
        
    
    }

?>