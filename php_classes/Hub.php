<?php
    class Hub extends User{
        private $capacity;
        private $name;

        public function Hub($mail, $password, $telephone, $capacity, $name)
        {
            $this->User($mail,$password,"hub",$telephone);
            $this->capacity=$capacity;
            $this->name=$name;
        }

        public function getCapacity() {
            return $this->capacity;
        }
        
        public function setCapacity($capacity) {
             $this->capacity = $capacity;
        }

        public function getName() {
            return $this->name;
        }
        
        public function setName($name) {
             $this->name = $name;
        }

        public function getDistanceHub($hub)
        {
            return 1;
        }
    }
?>