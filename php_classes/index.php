<?php
session_start();
error_reporting(E_ALL);
require_once('Main.php');
$main = new Main();
 

$main->addTrain(new Train('Udine', 'Torino',123, new DateTime("30-12-2022 22:55:33"), $main->reset()));
$main->addTrain(new Train('Trento', 'Firenze',234, new DateTime("28-12-2022 18:25:33"), $main->reset()));
$main->addTrain(new Train('Torino', 'Udine',345, new DateTime("22-2-2022 11:35:13"), $main->reset()));
$main->addTrain(new Train('Firenze', 'Trento',456, new DateTime("10-06-2022 1:05:33"), $main->reset()));
$main->addTrain(new Train('Trento', 'Firenze',567, new DateTime("28-12-2022 21:35:33"), $main->reset()));
$main->addTrain(new Train('Torino', 'Udine',678, new DateTime("30-12-2022 06:35:33"), $main->reset()));
$main->addTrain(new Train('Firenze', 'Trento',891, new DateTime("10-10-2022 10:15:33"), $main->reset()));


$boxes[] = new Box('Treviso', 'Bologna','bologna', $main->reset());
$boxes[] = new Box('Padova', 'Milano','milano', $main->reset());
$boxes[] = new Box('Torino', 'Milano','milano', $main->reset());

$main->distributeBoxesInWagons($boxes);
$main->distributeWagonsInTrains();

$_SESSION['main'] = $main;

?>

<html>

<head>
    <title>INDEX DI PROVA</title>
</head>

<body>
    <pre>
        <a href="infoHub.php">
            info hub
        </a>
        <?php
        foreach ($main->getTrains() as $k => $v) {
            // echo $v->getDateTimeDeparture()->format("d/m/Y H:i:s");
        }
        //echo "<br/><br/><br/>";
        // $main->splitWagons();
        ?>
        </pre>
</body>

</html>