<?php
    class Wagon extends Utility{
        private $arrayOfBox;
        private $capacity;

        public function __construct($arrayOfBox, $capacity)
        {
            $this->arrayOfBox=$arrayOfBox;
            $this->capacity=$capacity;
            $this->Utility("wagon");
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

    }
?>