<?php
require_once "Main.php";
require_once "Hub.php";
require_once "Train.php";
require_once "User.php";
session_start();
$_SESSION = unserialize(serialize($_SESSION));
$main = $_SESSION['main'];
$hubs = $main->getHubs();
$trains = $main->getTrains();
// var_dump($_REQUEST);
foreach ($trains as $key => $t) {
    if ($t->getId() == $_REQUEST['train']) {
        $train = $t;
    }
}
foreach ($hubs as $key => $h) {
    if ($h->getId() == $_REQUEST['hub']) {
        $hub = $h;
    }
}

$a = $hub->getWagonsByTrain($train);
foreach($a as $key => $wagons){
    foreach($wagons as $k => $value){
        echo $value->getId()." - ";
    }
    echo "<br/>";
}

?>