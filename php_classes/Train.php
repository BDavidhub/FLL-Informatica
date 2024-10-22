<?php

require_once('Doctrine/OrientDB/Graph/GraphInterface.php');
require_once('Doctrine/OrientDB/Graph/Graph.php');
require_once('Doctrine/OrientDB/Graph/VertexInterface.php');
require_once('Doctrine/OrientDB/Graph/Vertex.php');
require_once('Doctrine/OrientDB/Graph/Algorithm/AlgorithmInterface.php');
require_once('Doctrine/OrientDB/Graph/Algorithm/Dijkstra.php');

use Doctrine\OrientDB\Graph\Graph;
use Doctrine\OrientDB\Graph\Vertex;
use Doctrine\OrientDB\Graph\Algorithm\Dijkstra;

require_once('Wagon.php');

class Train extends Utility
{
    private $wagons;
    private $limit;
    private $hubs;
    private $dateDimeDeparture;
    private $cod;
    public function __construct($departure,$arrive, $id, $dateDimeDeparture, $main, $wagons = null, $limit = 10)
    {
       
        $this->wagons = $wagons;

        $this->limit = $limit;
        $this->cod = $id;
        $this->dateDimeDeparture = $dateDimeDeparture;
        $this->hubs = $main->computeDistance($departure,$arrive);
        parent::__construct("train", $id);
    }

    public function getWagons()
    {
        return $this->wagons;
    }
    public function getDeparture()
    {
        return $this->hubs[0];
    }
    public function getCod()
    {
        return $this->cod;
    }
    public function getArrive()
    {
        return $this->hubs[count($this->hubs) - 1];
    }

    public function getHubs()
    {
        return $this->hubs;
    }
    public function setId($id1)
    {
        $this->id = $id1;
    }
    public function getId()
    {
        return parent::getId();
    }
    public function setWagons($wagons)
    {
        $this->wagons = $wagons;
    }

    public function getLimit()
    {
        return $this->limit;
    }
    public function getDateTimeDeparture()
    {
        return $this->dateDimeDeparture;
    }

    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    public function calcolaVagoniLiberi()
    {
        return $this->limit - count($this->wagons);
    }
    public function addWagon($wagon)
    {
        $this->wagons[] = $wagon;
    }
    public function hasSubpath($path)
    {
        $departure = $path[0]->getName();
        $arrive = $path[count($path) - 1]->getName();
        $posDeparture = $posArrive = -1;
        for ($i = 0; $i < count($this->hubs); $i++) {
           /* echo $i.'<br/>';
                echo 'partenza: '.$this->hubs[$i]->getName().' == '.$departure.'<br/>';
                echo 'arrive: '.$this->hubs[$i]->getName().' == '.$arrive.'<br/>';*/
            if ($this->hubs[$i]->getName() == $departure) $posDeparture = $i;
            if ($this->hubs[$i]->getName() == $arrive) $posArrive = $i;
            // echo '('.$posDeparture.','.$posArrive.')<br/><br/>';
        }
        return ($posDeparture < $posArrive && $posDeparture > -1);
    }
    public function canAdd($wagon)
    {
        $flag = true;
        foreach ($this->hubs as $key => $hub) {
            if (in_array($hub, $wagon->getHubs())) {
                $c = 0;
                foreach ($this->wagons as $key => $w) {
                    if (in_array($hub, $w->getHubs())) $c++;
                }
                if ($this->limit = $c) {
                    $flag = false;
                    break;
                }
            }
        }
        return false;
    }

    public function getPreviousHub($hub)
    { 
        $tmp1=null;
        $tmp2=null;
        foreach ($this->hubs as $key => $hubs){
            $tmp2=$tmp1;
            $tmp1=$key;
            if($this->hubs[$tmp1]==$hub)
            {
                return $this->hubs[$tmp2];
            }
        }
        return false;
    }

    //------------------------------------------------------------------------------------
    //QUESTE NON TI SERVONO, LE HAI GIÀ FATTE IN Hub.php CON IL METODO getWagonsByTrain
    //------------------------------------------------------------------------------------

    /*public function oneHub($hub)
    {
        $ws = array();
        $ws = $this->getInOutConfig($hub);
        if ($ws[1] == null) return $ws[0];
        return $ws[1];
    }

    public function oneHubInverted($hub)
    {
        $ws = array();
        $ws = $this->getInOutConfigInverted($hub);
        if ($ws[1] == null) return $ws[0];
        return $ws[1];
    }*/

    /// UD-VE-PD-MI-TO
    public function getDistanceFrom($hub1,$hub2)
    {
        $hubs=$this->getHubs();
        $hubArrive=$hubs[count($hubs)-1];
        $hubDeparture=$hubs[0];
        $counter = null;
        $definitiveCounter=null;
        if($hub1 == $hubArrive || $hub2 == $hubDeparture) return null;
        foreach($hubs as $hub)
        {
            if($hub == $hub1) $counter = 1;
            if($hub == $hub2) $definitiveCounter=$counter;
            if($counter!=null) $counter++;
        }
        return $definitiveCounter-1;
    }

    public function swap_positions($ws, $left, $right) {
        $backup_old_ws_right_value = $ws[$right];
        $ws[$right] = $ws[$left];
        $ws[$left] = $backup_old_ws_right_value;
        return $ws;
    }

    public function getOrdinatedWagons($hub,$ws)
    {
        /*
        $ws=array();
        if($this->getWagons()==null) return null;
        foreach($this->getWagons() as $wagon)
        {
            $hubs=$wagon->getHubs();
            $counter=0;
           // array_splice($this->wagons, $i, 1);
            for($i=0;$i<count($wagon->getHubs());$i++)
            {
                if($hub == $hubs[$i] && $hubs[$i]!=$wagon->getHubArrive())
                {
                    $counter=1;
                }
            }
            if($counter==1)
            {
                $ws[]=$wagon;
            }   
        }
        */
        for($i=0; $i<count($ws)-1; $i++) {
            $min = $i;
            for($j=$i+1; $j<count($ws); $j++) 
            {
                if ($this->getDistanceFrom($hub,$ws[$j]->getHubArrive())<$this->getDistanceFrom($hub,$ws[$min]->getHubArrive())) 
                {
                    $min = $j;
                }
            }
            $ws = $this->swap_positions($ws, $i, $min);
        }
        return $ws;
    }
}