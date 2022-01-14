<?php
    class User{
        private $mail;
        private $password;
        private $id;
        private $telephone;

        public function User($mail, $password, $id, $telephone)
        {
            $this->mail=$mail;
            $this->password=$password;
            $this->id=$id;
            $this->telephone=$telephone;
        }
        
        public function getMail() {
            return $this->mail;
        }

        public function setMail($mail) {
             $this->mail = $mail;
        }

        public function getPassword() {
            return $this->password;
        }
        
        public function setPassword($password) {
             $this->password = $password;
        }

        public function getId() {
            return $this->id;
        }
        
        public function setId($id) {
             $this->id = $id;
        }

        public function getTelephone() {
            return $this->telephone;
        }
        
        public function setTelephone($telephone) {
             $this->telephone = $telephone;
        }
    }
?>