<?php
    class Wagon extends Utility{
        private $hubs;
        private $boxes;
        private $capacity;
        private $sig;

        public function __construct($boxes,$id, $capacity = 10)
        {
            $this->boxes = $boxes;
            $this->hubs = $boxes[0]->getHubs();
            $this->capacity = $capacity;
            parent::__construct("wagon",$id);

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

        public function getSig($hubArrive)
        {
            switch ($hubArrive->getName()) {
                case 'Udine':
                    $this->sig = 'UD';
                    break;
                case 'Trento':
                    $this->sig = 'TN';
                    break;
                case 'Torino':
                    $this->sig = 'TO';
                    break;
                case 'Firenze':
                    $this->sig = 'FI';
                    break;
                case 'Bologna':
                    $this->sig = 'BO';
                    break;
                case 'Padova':
                    $this->sig = 'PD';
                    break;
                case 'Milano':
                    $this->sig = 'MI';
                    break;
                case 'Treviso':
                    $this->sig = 'TV';
                    break;
            }
            return $this->sig;
        }

        public function getShortWagon()
        {
            $ws['id'] = $this->getId();
            $ws['arrive'] = $this->getHubArrive();
            $ws['arrAbb'] = $this->getSig($this->getHubArrive());
            return $ws;
        }
    }
