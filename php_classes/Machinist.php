<?php
    class Machinist extends User{

        public function __construct($mail, $password, $telephone,$cod)
        {
            parent::__construct($mail,$password,'machinist',$telephone,$cod);
        }
        
    }
