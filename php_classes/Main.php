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
    
    require_once('Utility.php');
    require_once('User.php');
    require_once('Hub.php');

    $hubs = array();
    $hubs[] = new Hub("mailUdine", "passwordUdine", "telefonoUdine", 10, "Udine");
    $hubs[] = new Hub("mailTreviso", "passwordTreviso", "telefonoTreviso", 10, "Treviso");
    $hubs[] = new Hub("mailPadova", "passwordPadova", "telefonoPadova", 10, "Padova");
    $hubs[] = new Hub("mailBologna", "passwordBologna", "telefonoBologna", 10, "Bologna");
    $hubs[] = new Hub("mailFirenze", "passwordFirenze", "telefonoFirenze", 10, "Firenze");
    $hubs[] = new Hub("mailMilano", "passwordMilano", "telefonoMilano", 10, "Milano");
    $hubs[] = new Hub("mailTorino", "passwordTorino", "telefonoTorino", 10, "Torino");


    $vertex = array();
    foreach($hubs as $key => $value){
        $hubs[$value->getName()] = $value;
        $vertex[$value->getName()] = new Vertex($value->getName());
        unset($hubs[$key]);
    }

    $G = new Graph();

    foreach ($vertex as $key => $value) {
        $G->add($value);
    }

    $vertex['Udine']->connect($vertex['Treviso'],$hubs['Udine']->getDistanceForm($hubs['Treviso']));
    $vertex['Treviso']->connect($vertex['Padova'],$hubs['Treviso']->getDistanceForm($hubs['Padova']));
    $vertex['Padova']->connect($vertex['Bologna'],$hubs['Padova']->getDistanceForm($hubs['Bologna']));
    $vertex['Bologna']->connect($vertex['Firenze'],$hubs['Bologna']->getDistanceForm($hubs['Firenze']));
    $vertex['Bologna']->connect($vertex['Milano'],$hubs['Bologna']->getDistanceForm($hubs['Milano']));
    $vertex['Milano']->connect($vertex['Torino'],$hubs['Milano']->getDistanceForm($hubs['Torino']));

    $algorithm = new Dijkstra($G);
    $algorithm->setStartingVertex($vertex['Udine']);
    $algorithm->setEndingVertex($vertex['Firenze']);

    echo $algorithm->getLiteralShortestPath() . ": distance " . $algorithm->getDistance();
    echo "<pre>";
    var_dump($G);
    echo "</pre>";

?>