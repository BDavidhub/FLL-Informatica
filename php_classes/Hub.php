<?php
    require_once('User.php');
    class Hub extends User{
        private $capacity;
        private $name;

        public function __construct($mail, $password, $telephone, $capacity, $name,$id)
        {
            parent::__construct($mail,$password,"hub",$telephone,$id);
            $this->capacity = $capacity;
            $this->name = $name;
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

        public function getDistanceFrom($hub)
        {
            /*
            if(($this->getName() == 'Treviso' && $hub->getName() == 'Udine') || ($this->getName() == 'Udine' && $hub->getName() == 'Treviso'))
                return 5;
            if(($this->getName() == 'Treviso' && $hub->getName() == 'Padova') || ($this->getName() == 'Padova' && $hub->getName() == 'Treviso'))
                return 4;
            if(($this->getName() == 'Padova' && $hub->getName() == 'Bologna') || ($this->getName() == 'Bologna' && $hub->getName() == 'Padova'))
                return 5;
            if(($this->getName() == 'Bologna' && $hub->getName() == 'Milano') || ($this->getName() == 'Milano' && $hub->getName() == 'Bologna'))
                return 4;
            if(($this->getName() == 'Milano' && $hub->getName() == 'Torino') || ($this->getName() == 'Torino' && $hub->getName() == 'Milano'))
                return 3;
            if(($this->getName() == 'Bologna' && $hub->getName() == 'Firenze') || ($this->getName() == 'Firenze' && $hub->getName() == 'Bologna'))
                return 3;
            if(($this->getName() == 'Trento' && $hub->getName() == 'Padova') || ($this->getName() == 'Padova' && $hub->getName() == 'Trento'))
                return 3;
            */
           /* if(($this->getName() == 'Venezia' && $hub->getName() == 'Udine') || ($this->getName() == 'Udine' && $hub->getName() == 'Venezia'))
                return 1;
            if(($this->getName() == 'Venezia' && $hub->getName() == 'Padova') || ($this->getName() == 'Padova' && $hub->getName() == 'Venezia'))
                return 1;
            if(($this->getName() == 'Padova' && $hub->getName() == 'Milano') || ($this->getName() == 'Milano' && $hub->getName() == 'Padova'))
                return 1;
            if(($this->getName() == 'Milano' && $hub->getName() == 'Torino') || ($this->getName() == 'Torino' && $hub->getName() == 'Milano'))*/
                return 1;
        }

    public function getWagonsByTrain($train)
    {
        $in = $train->getPreviousHub($this)->getTrainInOutConfig($train);
        $out = $this->getTrainInOutConfig($train);
       
        return array($in,$out);
    }


    //------------------------------------------------------------------------------------
    //DEVE ESSERCI SOLO getWagonsByTrain, non anche getWagonsByTrainInverted
    //LA STESSA COSA VALE PER getTrainInOutConfig
    //DEVI ANCHE PROVARE I METODI QUANDO LI HAI FATTI
    //------------------------------------------------------------------------------------

    public function getTrainInOutConfig($train){
       $wagons = array();
        if (!in_array($this, $train->getHubs())) return null;
        foreach($train->getWagons() as $key => $wagon){
            if(in_array($this,$wagon->getHubs())){
                $wagons[] = $wagon;
            }
        }
       

        return $wagons;
    }

}
