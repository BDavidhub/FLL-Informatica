<?php
    class _Private extends User{
        private $name;
        private $surname;
        private $accountingAdress;

        public function _Private($mail, $password, $telephone, $name, $surname, $accountingAdress)
        {
            $this->User($mail,$password,"private",$telephone);
            $this->name=$name;
            $this->surname=$surname;
            $this->accountingAdress=$accountingAdress;
        }

        public function getName() {
            return $this->name;
        }
        
        public function setName($name) {
             $this->name = $name;
        }

        public function getSurname() {
            return $this->surname;
        }
        
        public function setSurname($surname) {
             $this->surname = $surname;
        }
        public function getAccountingAdress() {
            return $this->accountingAdress;
        }
        
        public function setAccountingAdress($accountingAdress) {
             $this->accountingAdress = $accountingAdress;
        }

    }
?>