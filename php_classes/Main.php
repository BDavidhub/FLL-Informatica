<?php
error_reporting(E_ALL);
require_once('Doctrine/OrientDB/Graph/GraphInterface.php');
require_once('Doctrine/OrientDB/Graph/Graph.php');
require_once('Doctrine/OrientDB/Graph/VertexInterface.php');
require_once('Doctrine/OrientDB/Graph/Vertex.php');
require_once('Doctrine/OrientDB/Graph/Algorithm/AlgorithmInterface.php');
require_once('Doctrine/OrientDB/Graph/Algorithm/Dijkstra.php');
require_once('Doctrine/OrientDB/Exception.php');
require_once('Doctrine/OrientDB/LogicException.php');
require_once('Doctrine/OrientDB/OverflowException.php');

use Doctrine\OrientDB\Graph\Graph;
use Doctrine\OrientDB\Graph\Vertex;
use Doctrine\OrientDB\Graph\Algorithm\Dijkstra;

require_once('Box.php');
require_once('Train.php');
require_once('Hub.php');

class Main
{
    private $hubs;
    private $trains;
    private $wagons;
    private $graph;
    private $vertices;

    public function __construct()
    {
        $this->reset();
        $this->trains = array();
        $this->wagons = array();
    }

    public function getHubs()
    {
        return $this->hubs;
    }
    public function getGraph()
    {
        return $this->graph;
    }
    public function getWagons()
    {
        return $this->wagons;
    }
    public function getTrains()
    {
        return $this->trains;
    }
    public function getvertices()
    {
        return $this->vertices;
    }
    public function addTrain($train)
    {
        $this->trains[] = $train;
    }
    public function reset()
    {
        unset($this->hubs);
        unset($this->graph);
        unset($this->vertices);
        $this->hubs[] = new Hub('mailUdine', 'passwordUdine', 'telefonoUdine', 10, 'Udine');
        $this->hubs[] = new Hub('mailTreviso', 'passwordTreviso', 'telefonoTreviso', 10, 'Treviso');
        $this->hubs[] = new Hub('mailPadova', 'passwordPadova', 'telefonoPadova', 10, 'Padova');
        $this->hubs[] = new Hub('mailBologna', 'passwordBologna', 'telefonoBologna', 10, 'Bologna');
        $this->hubs[] = new Hub('mailFirenze', 'passwordFirenze', 'telefonoFirenze', 10, 'Firenze');
        $this->hubs[] = new Hub('mailMilano', 'passwordMilano', 'telefonoMilano', 10, 'Milano');
        $this->hubs[] = new Hub('mailTorino', 'passwordTorino', 'telefonoTorino', 10, 'Torino');
        $this->hubs[] = new Hub('mailTrento', 'passwordTrento', 'telefonoTrento', 10, 'Trento');

        foreach ($this->hubs as $key => $value) {
            $this->hubs[$value->getName()] = $value;
            $this->vertices[$value->getName()] = new Vertex($value->getName());
            unset($this->hubs[$key]);
        }
        $this->graph = new Graph();

        foreach ($this->vertices as $key => $value) {
            $this->graph->add($value);
        }
        $this->vertices['Udine']->connect($this->vertices['Treviso'], $this->hubs['Udine']->getDistanceFrom($this->hubs['Treviso']));
        $this->vertices['Treviso']->connect($this->vertices['Padova'], $this->hubs['Treviso']->getDistanceFrom($this->hubs['Padova']));
        $this->vertices['Padova']->connect($this->vertices['Bologna'], $this->hubs['Padova']->getDistanceFrom($this->hubs['Bologna']));
        $this->vertices['Bologna']->connect($this->vertices['Firenze'], $this->hubs['Bologna']->getDistanceFrom($this->hubs['Firenze']));
        $this->vertices['Bologna']->connect($this->vertices['Milano'], $this->hubs['Bologna']->getDistanceFrom($this->hubs['Milano']));
        $this->vertices['Milano']->connect($this->vertices['Torino'], $this->hubs['Milano']->getDistanceFrom($this->hubs['Torino']));
        $this->vertices['Padova']->connect($this->vertices['Trento'], $this->hubs['Trento']->getDistanceFrom($this->hubs['Padova']));

        $this->vertices['Treviso']->connect($this->vertices['Udine'], $this->hubs['Udine']->getDistanceFrom($this->hubs['Treviso']));
        $this->vertices['Padova']->connect($this->vertices['Treviso'], $this->hubs['Treviso']->getDistanceFrom($this->hubs['Padova']));
        $this->vertices['Bologna']->connect($this->vertices['Padova'], $this->hubs['Padova']->getDistanceFrom($this->hubs['Bologna']));
        $this->vertices['Firenze']->connect($this->vertices['Bologna'], $this->hubs['Bologna']->getDistanceFrom($this->hubs['Firenze']));
        $this->vertices['Milano']->connect($this->vertices['Bologna'], $this->hubs['Bologna']->getDistanceFrom($this->hubs['Milano']));
        $this->vertices['Torino']->connect($this->vertices['Milano'], $this->hubs['Milano']->getDistanceFrom($this->hubs['Torino']));
        $this->vertices['Trento']->connect($this->vertices['Padova'], $this->hubs['Trento']->getDistanceFrom($this->hubs['Padova']));
        return $this;
    }
    public function computeDistance($departure, $arrive)
    {
        $algorithm = new Dijkstra($this->graph);
        $algorithm->setStartingVertex($this->graph->getVertex($departure));
        $algorithm->setEndingVertex($this->graph->getVertex($arrive));
        $hubsCode = explode('#', $algorithm->getLiteralShortestPath());
        $path = array();
        foreach ($hubsCode as $key => $hubCode) {
            $path[$key] = $this->hubs[$hubCode];
        }
        return $path;
    }
    public function distributeBoxesInWagons($boxes)
    {
        foreach ($boxes as $key => $box) {
            $flag = true;
            if ($this->wagons != null) {
                foreach ($this->wagons as $key2 => $wagon) {
                    if ($wagon->tryToAdd($box)) {
                        $flag = false;
                        break;
                    }
                }
            }
            if ($flag) $this->wagons[] = new Wagon(array($box));
        }
    }
    public function splitWagons()
    {
        foreach ($this->wagons as $key => $wagon) {
            $find = false;
            foreach ($this->trains as $key2 => $train) {
                if ($train->hasSubpath($wagon->getHubs())) {
                    echo 'treno Trovato<br/><br/>';
                    $find = true;
                    break;
                }
            }
            if (!$find) {
                echo 'treno non trovato per il vagone';
                var_dump($wagon);
                foreach ($this->trains as $key2 => $train) {
                    echo $train->getMaxPathPrefixLength($wagon->getHubs()) . '<br/>';
                }
                echo '<br/><br/>';
            }
        }
    }
    public function distributeWagonsInTrains()
    {
        foreach ($this->wagons as $key => $wagon) {
            foreach ($this->trains as $key2 => $train) {
                if ($train->hasSubpath($wagon->getHubs())) {
                    //if($train->canAdd($wagon)){
                    $train->addWagon($wagon);
                    break;
                    //}
                } else { //TODO: DA FINIRE
                    /*$flag = true;
                        while($flag){
                            $splittedWagon = array();
                            $l = $train->getMaxPathPrefixLength($wagon->getHubs());
                        }*/
                }
            }
        }
    }

    public function findingTrainsAlgo($depart, $arriv, $timeStamp)
    {
        $indexArray = array();
        $found = 0;

        for ($curr = 0; $curr < count($this->trains); $curr++) {
            if (($this->trains[$curr]->getDeparture()->getName() == $depart) && ($this->trains[$curr]->getArrive()->getName() == $arriv) && ($timeStamp < $this->trains[$curr]->getDateTimeDeparture()->format('d-m-Y'))) {
                $indexArray[$found] = $curr;
                // echo $this->trains[$curr]->getDeparture() . $this->trains[$curr]->getTimestamp();
                $found++;
            }
        }

        return $indexArray;
    }
}
