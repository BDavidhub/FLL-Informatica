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
    private $timestampDeparture;
    private $departure;
    private $arrive;

    public function __construct($departure, $arrive, $timestampDeparture, $main, $wagons = null, $limit = 10)
    {
        if ($wagons == null)
            $this->wagons = array();
        else
            $this->wagons = $wagons;

        $this->limit = $limit;
        $this->timestampDeparture = $timestampDeparture;
        $this->departure = $departure;
        $this->arrive = $arrive;
        $this->hubs = $main->computeDistance($departure, $arrive);
        parent::__construct("train");
    }

    public function getWagons()
    {
        return $this->wagons;
    }
    public function getDeparture()
    {
        return $this->departure;
    }
    public function getArrive()
    {
        return $this->arrive;
    }

    public function getHubs()
    {
        return $this->hubs;
    }

    public function setWagons($wagons)
    {
        $this->wagons = $wagons;
    }

    public function getLimit()
    {
        return $this->limit;
    }
    public function getTimestamp()
    {
        return $this->timestampDeparture;
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
            /*echo $i.'<br/>';
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
    public function getWagonsByHub($hub)
    { //TODO: Da sistemare
        $ws = array();
        if (!in_array($hub, $this->hubs)) return null;
        foreach ($this->wagons as $key => $wagon) {
            if (!in_array($hub, $wagon->getHubs())) {
                $ws[] = $wagon;
            }
        }
    }
}
