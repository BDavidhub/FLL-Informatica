<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('Main.php');

echo "<pre>";

$main = new Main();

$main->addTrain(new Train('Udine', 'Torino', 1, new DateTime("30-12-2022 02:00:00"), $main->reset(true)));
$main->addTrain(new Train('Udine', 'Torino', 2, new DateTime("30-12-2022 12:00:00"), $main->reset(true)));
$main->addTrain(new Train('Torino', 'Udine', 3, new DateTime("30-12-2022 12:00:00"), $main->reset(false)));
$main->addTrain(new Train('Torino', 'Udine', 4, new DateTime("30-12-2022 22:00:00"), $main->reset(false)));
var_dump($main->getTrains());
echo "</pre>";

$boxes[] = new Box('Udine', 'Milano', $main->reset(true),1);
$boxes[] = new Box('Torino', 'Udine', $main->reset(false),2);
$boxes[] = new Box('Torino', 'Udine', $main->reset(false),3);

$main->distributeBoxesInWagons($boxes);
$main->distributeWagonsInTrains();
$_SESSION['main'] = $main;

echo $_POST['fdove'];
echo $_POST['fdestinazione'];
echo $_POST['fdata'];

$_SESSION['dove'] = $_POST['fdove'];
$_SESSION['destinazione'] = $_POST['fdestinazione'];
$_SESSION['data'] = new DateTime($_POST['fdata']);

//$hubs=$main->getHubs();
//var_dump($hubs);
//$trains=$main->getTrainS();
//$ws=$hubs['Torino']->getTrainInOutConfig($trains[0]);
//echo $ws;
 //header('location: ../pages/TreniRicerca.php?n=1');
 //exit;
?>

<html>

<head>
    <title>INDEX DI PROVA</title>
</head>

<body> 
        <a href="infoHub.php">
            info hub
        </a>
    <pre>
        <?php

var_dump($main);
        
        //echo "<br/><br/><br/>";
        // $main->splitWagons();
        ?>
        </pre>
</body>

</html>