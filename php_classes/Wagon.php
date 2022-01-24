<?php
    class Wagon extends Utility{
        private $hubs;
        private $boxes;
        private $capacity;

        public function __construct($boxes, $capacity = 10)
        {
            $this->boxes = $boxes;
            $this->hubs = $boxes[0]->getHubs();
            $this->capacity = $capacity;
            parent::__construct("wagon");
        }

        public function getBoxes() {
            return $this->boxes;
        }
        
        public function setBoxes($boxes) {
             $this->boxes = $boxes;
        }
        public function getHubArrive() {
            return $this->hubs[count($this->hubs)-1];
        }
        public function getHubDeparture() {
            return $this->hubs[0];
        }
        public function getHubs() {
            return $this->hubs;
        }
        public function getCapacity() {
            return $this->capacity;
        }
        
        public function setCapacity($capacity) {
             $this->capacity = $capacity;
        }
        public function getFreeSpace() {
            $space = $this->capacity;
            if($this->boxes != null){
                foreach ($this->boxes as $key => $box) {
                    $space -= $box->getSize();
                }
            }
            return $space;
        }
        public function addBox($box)
        {
            $this->boxes[] = $box;
        }
        public function hasTheSamePathOf($box){
            $departure = $box->getHubDeparture()->getName();
            $arrive = $box->getHubArrive()->getName();
            return ($this->getHubDeparture()->getName() == $departure && $this->getHubArrive()->getName() == $arrive);
        }
        public function tryToAdd($box){
            if($this->hasTheSamePathOf($box)){
                if($this->getFreeSpace()>=$box->getSize()){
                    $this->addBox($box);
                    return true;
                }
            }
            return false;
        }

        public function getShortWagon()
        {
            $ws=array();
            $ws[0]=$this->getHubDeparture();
            $ws[1]=$this->getHubArrive();
            $ws[2]=$this->getHubs();
            return $ws;
        }
    }
