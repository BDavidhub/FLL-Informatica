<?php
    require_once('User.php');
    class Hub extends User{
        private $capacity;
        private $name;

        public function __construct($mail, $password, $telephone, $capacity, $name)
        {
            parent::__construct($mail,$password,"hub",$telephone);
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
        }

    public function getWagonsByTrain($train)
    {
        $ws = array();
        $fin = array();
        if (!in_array($this->hub, $train->getHubs())) return null;
        foreach ($train->getWagons() as $key => $wagon) {
            if (in_array($this->hub, $wagon->getHubs())) { // Non devi inserire il vagone nell'array se l'hub è l'ultimo del percorso del vagone
                $ws[] = $wagon;
            }
        }
        for ($tmp = 0; $tmp < count($ws); $tmp++) {
            $fin[$tmp] = $ws[0];
            for ($tmp1 = 1; $tmp1 < count($ws); $tmp1++) {
                if ($this->getDistanceFrom($fin[$tmp]->getHubArrive()) > $this->getDistanceFrom($ws[$tmp1]->getHubArrive())) {
                    $fin[$tmp] = $ws[$tmp1];
                    $tmp2 = $tmp1;
                }
            }
            array_splice($ws, $tmp2, 1);
        }
        return $fin;
    }


    //------------------------------------------------------------------------------------
    //DEVE ESSERCI SONO getWagonsByTrain, non anche getWagonsByTrainInverted
    //LA STESSA COSA VALE PER getTrainInOutConfig
    //DEVI ANCHE PROVARE I METODI QUANDO LI HAI FATTI
    //------------------------------------------------------------------------------------

    public function getWagonsByTrainInverted($train)
    {
        $ws = array();
        $fin = array();
        if (!in_array($this->hub, $train->getHubs())) return null;
        foreach ($train->getWagons() as $key => $wagon) {
            if (in_array($this->hub, $wagon->getHubs())) {
                $ws[] = $wagon;
            }
        }
        for ($tmp = 0; $tmp > count($ws); $tmp++) {
            $fin[$tmp] = $ws[0];
            for ($tmp1 = 1; $tmp1 < count($ws); $tmp1++) {
                if ($this->getDistanceFrom($fin[$tmp]->getHubArrive()) > $this->getDistanceFrom($ws[$tmp1]->getHubArrive())) {
                    $fin[$tmp] = $ws[$tmp1];
                    $tmp2 = $tmp1;
                }
            }
            array_splice($ws, $tmp2, 1);
        }
        return $fin;
    }
    public function getTrainInOutConfig($train){
        $ws = array();
        if($this == $train->getDeparture()){
            $ws[0] = null;
        } else {
            $ws[0] = $train->previousHub($this)->getWagonsByTrain($train);
        }

        if($this == $train->getArrive()){
            $ws[1] = null;
        } else {
            $ws[1] = $this->getWagonsByTrain($train);
        }
        return $ws;
    }
}
