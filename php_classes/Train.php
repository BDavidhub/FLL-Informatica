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
    public function __construct($departure, $arrive, $cod1, $dateDimeDeparture, $main, $wagons = null, $limit = 10)
    {
        if ($wagons == null)
            $this->wagons = array();
        else
            $this->wagons = $wagons;

        $this->limit = $limit;
        $this->cod = $cod1;
        $this->dateDimeDeparture = $dateDimeDeparture;
        $this->hubs = $main->computeDistance($departure, $arrive);
        parent::__construct("train", $cod1);
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
    public function getWagonsByHub($hub) //spostare in hub
    { //TODO: Da sistemare
        $ws = array();
        $fin = array();
        if (!in_array($hub, $this->hubs)) return null;
        foreach ($this->wagons as $key => $wagon) {
            if (in_array($hub, $wagon->getHubs())) {
                $ws[] = $wagon;
            }
        }
        for ($tmp = 0; $tmp < count($ws); $tmp++) {
            $fin[$tmp] = $ws[0];
            for ($tmp1 = 1; $tmp1 < count($ws); $tmp1++) {
                if ($hub->getDistanceFrom($fin[$tmp]->getHubArrive()) > $hub->getDistanceFrom($ws[$tmp1]->getHubArrive())) {
                    $fin[$tmp] = $ws[$tmp1];
                    $tmp2 = $tmp1;
                }
            }
            array_splice($ws, $tmp2, 1);
        }
        return $fin;
    }

    public function previousHub($hub)
    {
        $tmp = -1;
        for ($tmp1 = 0; $this->hubs[$tmp1] != $hub || $tmp1 < count($this->hubs); $tmp1++) {
            if ($this->hubs[$tmp1] != $hub) {
                $tmp = $this->hubs[$tmp1];
            }
        }
        return $tmp;
    }

    public function twoHub($hub)
    {
        $ws = array();
        if ($this->getDeparture() == $hub) $ws[0] = null;
        $ws[1] = $this->getWagonsByHub($hub);
        if ($this->getArrive() == $hub) $ws[0] = $this->getWagonsByHub($hub);
        $ws[1] = null;
        $ws[0] = $this->getWagonsByHub($this->previousHub($hub));
        $ws[1] = $this->getWagonsByHub($hub);
        return $ws;
    }

    public function getWagonsByHubInverted($hub)
    { //TODO: Da sistemare
        $ws = array();
        $fin = array();
        if (!in_array($hub, $this->hubs)) return null;
        foreach ($this->wagons as $key => $wagon) {
            if (in_array($hub, $wagon->getHubs())) {
                $ws[] = $wagon;
            }
        }
        for ($tmp = 0; $tmp < count($ws); $tmp++) {
            $fin[$tmp] = $ws[0];
            for ($tmp1 = 1; $tmp1 < count($ws); $tmp1++) {
                if ($hub->getDistanceFrom($fin[$tmp]->getHubArrive()) < $hub->getDistanceFrom($ws[$tmp1]->getHubArrive())) {
                    $fin[$tmp] = $ws[$tmp1];
                    $tmp2 = $tmp1;
                }
            }
            array_splice($ws, $tmp2, 1);
        }
        return $fin;
    }

    public function twoHubInverted($hub)
    {
        $ws = array();
        if ($this->getDeparture() == $hub) $ws[0] = null;
        $ws[1] = $this->getWagonsByHubInverted($hub);
        if ($this->getArrive() == $hub) $ws[0] = $this->getWagonsByHubInverted($hub);
        $ws[1] = null;
        $ws[0] = $this->getWagonsByHubInverted($this->previousHub($hub));
        $ws[1] = $this->getWagonsByHubInverted($hub);
        return $ws;
    }

    public function oneHub($hub)
    {
        $ws = array();
        $ws = $this->twoHub($hub);
        if ($ws[1] == null) return $ws[0];
        return $ws[1];
    }
}
