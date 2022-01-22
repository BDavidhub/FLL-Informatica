<?php
    class _Private extends User{
        private $name;
        private $surname;
        private $accountingAdress;

        public function __construct($mail, $password, $telephone, $name, $surname, $accountingAdress,$cod)
        {
            parent::__construct($mail,$password,"private",$telephone,$cod);
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