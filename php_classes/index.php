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
$main->addTrain(new Train('Firenze', 'Trento',8910, new DateTime("10-10-2022 10:15:33"), $main->reset()));
$main->addTrain(new Train('Torino', 'Trento',91011, new DateTime("11-11-2022 02:35:35"), $main->reset()));
$main->addTrain(new Train('Firenze', 'Udine',101112, new DateTime("11-09-2022 10:12:22"), $main->reset()));
$main->addTrain(new Train('Udine', 'Trento',111213, new DateTime("31-05-2022 12:26:30"), $main->reset()));
$main->addTrain(new Train('Firenze', 'Trento',121314, new DateTime("25-04-2022 03:26:33"), $main->reset()));
$main->addTrain(new Train('Udine', 'Firenze',131415, new DateTime("13-12-2022 09:12:32"), $main->reset()));
$main->addTrain(new Train('Trento', 'Udine',141516, new DateTime("30-08-2022 11:26:12"), $main->reset()));


$boxes[] = new Box('Treviso', 'Bologna','bologna',123, $main->reset());
$boxes[] = new Box('Padova', 'Milano','milano',234, $main->reset());
$boxes[] = new Box('Torino', 'Milano','milano',456, $main->reset());

$main->distributeBoxesInWagons($boxes);
$main->distributeWagonsInTrains();

$_SESSION['main'] = $main;

echo $_POST['fdove'];
echo $_POST['fdestinazione'];
echo $_POST['fdata'];

$_SESSION['dove'] = $_POST['fdove'];
$_SESSION['destinazione'] = $_POST['fdestinazione'];
$_SESSION['data'] = new DateTime($_POST['fdata']);

header('location: ../pages/TreniRicerca.php?n=1');
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