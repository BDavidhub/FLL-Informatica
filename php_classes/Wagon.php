<?php
    class Wagon extends Utility{
        private $arrayOfBox;
        private $capacity;
        private $hubDeparture;
        private $hubArrive;


        public function Wagon($arrayOfBox, $capacity)
        {
            $this->arrayOfBox=$arrayOfBox;
            $this->capacity=$capacity;
            $this->Utility("wagon");
            $this->hubDeparture = $arrayOfBox[0];
            $this->hubArrive = $arrayOfBox[count($arrayOfBox)-1];

        }

        public function getArrayOfBox() {
            return $this->arrayOfBox;
        }
        
        public function setArrayOfBox($arrayOfBox) {
             $this->arrayOfBox = $arrayOfBox;
        }
        
        public function getCapacity() {
            return $this->capacity;
        }
        
        public function setCapacity($capacity) {
             $this->capacity = $capacity;
        }

        public function calcolaSpazio()
        {
            return 1;
        }
        public function getHubDeparture(){
            return $this->$hubDeparture;
        }
        public function sethubDeparture($hubDeparture){
            $this->$hubDeparture=$hubDeparture;
        }

        public function getHubArrive(){
            return $this->$hubArrive;
        }
        public function setHubArrive($hubArrive){
            $this->$hubArrive=$hubArrive;
        }

    }
?>