<?php
    class Box extends Utility{
        private $userDeparture;
        private $userArrive;
        private $dimension;

        public function __construct($userDeparture, $userArrive, $dimension)
        {
            $this->userDeparture=$userDeparture;
            $this->userArrive=$userArrive;
            $this->dimension=$dimension;
            $this->Utility("box");
        }

        public function getUserDeparture() {
            return $this->userDeparture;
        }
        
        public function setUserDeparture($userDeparture) {
             $this->userDeparture = $userDeparture;
        }

        public function getUserArrive() {
            return $this->userArrive;
        }
        
        public function setUserArrive($userArrive) {
             $this->userArrive = $userArrive;
        }

        public function getDimension() {
            return $this->Dimension;
        }
        
        public function setDimension($dimension) {
             $this->dimension = $dimension;
        }
    }
?>