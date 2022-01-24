<?php
session_start();
error_reporting(E_ALL);
require_once('Main.php');

echo "<pre>";

$main = new Main();

/* 
$main->addTrain(new Train('Udine', 'Torino', 1, new DateTime("30-12-2022 22:55:33"), $main->reset()));
$main->addTrain(new Train('Trento', 'Firenze', 2, new DateTime("28-12-2022 18:25:33"), $main->reset()));
$main->addTrain(new Train('Torino', 'Udine', 3, new DateTime("22-2-2022 11:35:13"), $main->reset()));
$main->addTrain(new Train('Firenze', 'Trento', 4, new DateTime("10-06-2022 1:05:33"), $main->reset()));
$main->addTrain(new Train('Trento', 'Firenze', 5, new DateTime("28-12-2022 21:35:33"), $main->reset()));
$main->addTrain(new Train('Torino', 'Udine', 6, new DateTime("30-12-2022 06:35:33"), $main->reset()));
$main->addTrain(new Train('Firenze', 'Trento', 7, new DateTime("10-10-2022 10:15:33"), $main->reset()));
$main->addTrain(new Train('Torino', 'Trento', 8, new DateTime("11-11-2022 02:35:35"), $main->reset()));
$main->addTrain(new Train('Firenze', 'Udine', 9, new DateTime("11-09-2022 10:12:22"), $main->reset()));
$main->addTrain(new Train('Udine', 'Trento', 10, new DateTime("31-05-2022 12:26:30"), $main->reset()));
$main->addTrain(new Train('Firenze', 'Trento', 11, new DateTime("25-04-2022 03:26:33"), $main->reset()));
$main->addTrain(new Train('Udine', 'Firenze', 12, new DateTime("13-12-2022 09:12:32"), $main->reset()));
$main->addTrain(new Train('Trento', 'Udine', 13, new DateTime("30-08-2022 11:26:12"), $main->reset()));
*/
$main->addTrain(new Train('Udine', 'Torino', 1, new DateTime("30-12-2022 02:00:00"), $main->reset()));
$main->addTrain(new Train('Udine', 'Torino', 1, new DateTime("30-12-2022 12:00:00"), $main->reset()));
$main->addTrain(new Train('Torino', 'Udine', 1, new DateTime("30-12-2022 12:00:00"), $main->reset()));
$main->addTrain(new Train('Torino', 'Udine', 1, new DateTime("30-12-2022 22:00:00"), $main->reset()));

//var_dump($main->getTrains());
echo "</pre>";

$boxes[] = new Box('Udine', 'Milano', $main->reset());
$boxes[] = new Box('Torino', 'Padova', $main->reset());
$boxes[] = new Box('Torino', 'Padova', $main->reset());

$main->distributeBoxesInWagons($boxes);
$main->distributeWagonsInTrains();

$_SESSION['main'] = $main;

echo $_POST['fdove'];
echo $_POST['fdestinazione'];
echo $_POST['fdata'];

$_SESSION['dove'] = $_POST['fdove'];
$_SESSION['destinazione'] = $_POST['fdestinazione'];
$_SESSION['data'] = new DateTime($_POST['fdata']);
echo "<pre>";
//var_dump($main);
echo "</pre>";
//header('location: ../pages/TreniRicerca.php?n=1');
exit;
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