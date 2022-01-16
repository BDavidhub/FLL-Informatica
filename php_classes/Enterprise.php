<?php
    class Enterprise extends User{
        private $companyName;
        private $vat;
        private $accountingAdress;

        public function __construct($mail, $password, $telephone, $companyName, $vat, $accountingAdress)
        {
            $this->User($mail,$password,"enterprise",$telephone);
            $this->companyName=$companyName;
            $this->vat=$vat;
            $this->accountingAdress=$accountingAdress;
        }

        public function getCompanyName() {
            return $this->companyName;
        }
        
        public function setCompanyName($companyName) {
             $this->companyName = $companyName;
        }

        public function getVat() {
            return $this->vat;
        }
        
        public function setVat($vat) {
             $this->vat = $vat;
        }
        public function getAccountingAdress() {
            return $this->accountingAdress;
        }
        
        public function setAccountingAdress($accountingAdress) {
             $this->accountingAdress = $accountingAdress;
        }

    }
?>