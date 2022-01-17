<?php
    class Machinist extends User{

        public function Machinist($mail, $password, $telephone)
        {
            $this->User($mail, $password, "machinist", $telephone);
        }
        
    }
?>