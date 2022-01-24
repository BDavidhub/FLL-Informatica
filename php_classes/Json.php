<?php
    session_start(); 
    $_SESSION = unserialize(serialize($_SESSION));
    $main = $_SESSION['main'];
    $hubs = $main->getHubs();
    $trains = $main->getTrains();
    $train = $hub = null;


    foreach($trains as $key => $t){
        if($t->getId() == $_REQUEST['train']){
            $train = $t;
        }
    }
    foreach($hubs as $key => $h){
        if($h->getId() == $_REQUEST['hub']){
            $hub = $h;
        }
    }
    echo json_encode($hub->getTrainInOutConfig($train,1));
