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
require_once('_Private.php');

class Main
{
    private $hubs;
    private $trains;
    private $wagons;
    private $graph;
    private $vertices;
    private $privates;

    public function __construct()
    {
        $this->trains = array();
        $this->wagons = array();
        $this->reset(true);
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
    public function getPrivates()
    {
        return $this->privates;
    }
    public function addTrain($train)
    {
        $this->trains[] = $train;
    }
    public function addPrivates($private)
    {
        $this->privates[]=$private;
    }
    public function reset($flag)
    {
        unset($this->hubs);
        unset($this->graph);
        unset($this->vertices);

        $this->hubs[] = new Hub('mailUdine', 'passwordUdine', 'telefonoUdine', 10, 'Udine',1);
        $this->hubs[] = new Hub('mailVenezia', 'passwordVenezia', 'telefonoVenezia', 10, 'Venezia',2);
        $this->hubs[] = new Hub('mailPadova', 'passwordPadova', 'telefonoPadova', 10, 'Padova',3);
        $this->hubs[] = new Hub('mailMilano', 'passwordMilano', 'telefonoMilano', 10, 'Milano',4);
        $this->hubs[] = new Hub('mailTorino', 'passwordTorino', 'telefonoTorino', 10, 'Torino',5);

        foreach ($this->hubs as $key => $value) {
            $this->hubs[$value->getName()] = $value;
            $this->vertices[$value->getName()] = new Vertex($value->getName());
            unset($this->hubs[$key]);
        }

        $this->graph = new Graph();
        if($flag){
            $this->vertices['Udine']->connect($this->vertices['Venezia']);
            $this->vertices['Venezia']->connect($this->vertices['Padova']);
            $this->vertices['Padova']->connect($this->vertices['Milano']);
            $this->vertices['Milano']->connect($this->vertices['Torino']);
        }else{
            $this->vertices['Torino']->connect($this->vertices['Milano']);
            $this->vertices['Milano']->connect($this->vertices['Padova']);
            $this->vertices['Padova']->connect($this->vertices['Venezia']);
            $this->vertices['Venezia']->connect($this->vertices['Udine']);
        }

        $this->graph->add($this->vertices['Udine']);
        $this->graph->add($this->vertices['Venezia']);
        $this->graph->add($this->vertices['Padova']);
        $this->graph->add($this->vertices['Milano']);
        $this->graph->add($this->vertices['Torino']);

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
        $i = 1;
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
            if ($flag){
                $this->wagons[] = new Wagon(array($box),$i);
                $i++;
            }
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
        // echo"<pre>";
        // var_dump($this->trains);
        
        // echo"</pre>";
        for ($curr = 0; $curr < count($this->trains); $curr++) {
            if (($this->trains[$curr]->getDeparture()->getName() == $depart) && ($this->trains[$curr]->getArrive()->getName() == $arriv) && ($timeStamp < $this->trains[$curr]->getDateTimeDeparture())) {
                $indexArray[$found] = $curr;
                // echo $this->trains[$curr]->getDeparture() . $this->trains[$curr]->getTimestamp();
                $found++;
            }
        }

        return $indexArray;
    }
    public function hubsArray(){

        

    }

    public function getUser($mail){

        for ($i=0; $i < count($this->privates); $i++) { 
          if($this->privates[$i]->getMail()==$mail){
              return $this->privates[$i]->getName();
          }
        }
    }
}