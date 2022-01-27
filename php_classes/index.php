<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('Main.php');

echo "<pre>";

$main = new Main();

$main->addTrain(new Train('Udine', 'Torino', 1, new DateTime("30-12-2022 04:00:00"), $main->reset(true)));
$main->addTrain(new Train('Udine', 'Torino', 2, new DateTime("30-12-2022 15:00:00"), $main->reset(true)));
$main->addTrain(new Train('Torino', 'Udine', 3, new DateTime("10-2-2022 12:00:00"), $main->reset(false)));
$main->addTrain(new Train('Torino', 'Udine', 4, new DateTime("30-12-2022 19:00:00"), $main->reset(false)));
$main->addTrain(new Train('Torino', 'Udine', 5, new DateTime("30-12-2022 2:00:00"), $main->reset(false)));

//var_dump($main->getTrains());
echo "</pre>";

$boxes[] = new Box('Udine', 'Milano', $main->reset(true),1);
$boxes[] = new Box('Torino', 'Udine', $main->reset(false),2);
$boxes[] = new Box('Torino', 'Udine', $main->reset(false),3);
$boxes[] = new Box('Udine', 'Milano', $main->reset(true),4);
$boxes[] = new Box('Torino', 'Udine', $main->reset(false),5);
$boxes[] = new Box('Torino', 'Udine', $main->reset(false),6);
$boxes[] = new Box('Udine', 'Milano', $main->reset(true),7);
$boxes[] = new Box('Torino', 'Udine', $main->reset(false),8);
$boxes[] = new Box('Torino', 'Udine', $main->reset(false),9);

$main->distributeBoxesInWagons($boxes);
$main->distributeWagonsInTrains();
$_SESSION['main'] = $main;
//$hub=$main->getHubs();
$tmp=0;
/*foreach($main->getHubs() as $hub)
{
    foreach($main->getTrains() as $train)
    {
        if($tmp==4)
        {
            var_dump($hub->getTrainInOutConfig($train,1));
        }
    }
    $tmp++;
}*/

$_SESSION['dove'] = $_POST['fdove'];
$_SESSION['destinazione'] = $_POST['fdestinazione'];
$_SESSION['data'] = new DateTime($_POST['fdata']);
//$hubs=$main->getHubs();
//var_dump($hubs);
//$trains=$main->getTrainS();
//$ws=$hubs['Torino']->getTrainInOutConfig($trains[0]);
//echo $ws;
  header('location: ../pages/TreniRicerca.php?n=1');
  exit;
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

//var_dump($main);
        
        //echo "<br/><br/><br/>";
        // $main->splitWagons();
        ?>
        </pre>
</body>

</html>