<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('Main.php');

echo "<pre>";

$main = new Main();

$main->addTrain(new Train('Udine', 'Torino', 1, new DateTime("20-12-2022 04:00:00"), $main->reset(true)));
$main->addTrain(new Train('Udine', 'Torino', 2, new DateTime("20-12-2022 15:00:00"), $main->reset(true)));
$main->addTrain(new Train('Torino', 'Udine', 3, new DateTime("15-2-2022 12:00:00"), $main->reset(false)));
$main->addTrain(new Train('Torino', 'Udine', 4, new DateTime("20-12-2022 19:00:00"), $main->reset(false)));
$main->addTrain(new Train('Torino', 'Udine', 5, new DateTime("11-12-2022 06:00:00"), $main->reset(false)));

//var_dump($main->getTrains());
echo "</pre>";
// UD-VE-PD-MI-TO
$boxes[] = new Box('Udine', 'Milano', $main->reset(true),1);
$boxes[] = new Box('Torino', 'Udine', $main->reset(false),2);
$boxes[] = new Box('Torino', 'Udine', $main->reset(false),3);
$boxes[] = new Box('Udine', 'Milano', $main->reset(true),4);
$boxes[] = new Box('Torino', 'Udine', $main->reset(false),5);
$boxes[] = new Box('Torino', 'Udine', $main->reset(false),6);
$boxes[] = new Box('Udine', 'Milano', $main->reset(true),7);
$boxes[] = new Box('Torino', 'Udine', $main->reset(false),8);
$boxes[] = new Box('Torino', 'Udine', $main->reset(false),9);
$boxes[] = new Box('Udine', 'Padova', $main->reset(true),10);
$boxes[] = new Box('Milano', 'Torino', $main->reset(true),11);
$boxes[] = new Box('Padova', 'Torino', $main->reset(true),12);
$boxes[] = new Box('Venezia', 'Udine', $main->reset(false),13);

$main->distributeBoxesInWagons($boxes);
$main->distributeWagonsInTrains();
$_SESSION['main'] = $main;
//$hub=$main->getHubs();
//$tmp=0;
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
$hubs=$main->getHubs();
$trains=$main->getTrains();
// echo '<pre>';
// var_dump($hubs['Padova']->getWagonsByTrain($trains[0]));
// echo '</pre>';
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