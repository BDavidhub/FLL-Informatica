<?php
// require_once __WEBROOT__ . '/includes/safestring.class.php';
session_start();
require_once('Main.php');
echo '<pre>';

$main = new Main();

$main->addTrain(new Train('Udine', 'Torino', "30-12-2022 22:55:33", $main->reset()));
$main->addTrain(new Train('Trento', 'Firenze', "28-12-2022 18:25:33", $main->reset()));
$main->addTrain(new Train('Torino', 'Udine', "22-2-2022 11:35:13", $main->reset()));
$main->addTrain(new Train('Firenze', 'Trento', "10-06-2022 1:05:33", $main->reset()));
$main->addTrain(new Train('Trento', 'Firenze', "28-12-2022 21:35:33", $main->reset()));
$main->addTrain(new Train('Torino', 'Udine', "30-12-2022 06:35:33", $main->reset()));
$main->addTrain(new Train('Firenze', 'Trento', "10-10-2022 10:15:33", $main->reset()));


$boxes[] = new Box('Treviso', 'Bologna', $main->reset());
$boxes[] = new Box('Padova', 'Milano', $main->reset());
$boxes[] = new Box('Torino', 'Milano', $main->reset());

$main->distributeBoxesInWagons($boxes);
$main->distributeWagonsInTrains();

echo '</pre>';
$_SESSION['main'] = $main;
?>

<html>

<head>
    <title>INDEX DI PROVA</title>
</head>

<body>
    <a href="../pages/TreniRicerca.php">
        asdsda
    </a>
    <pre>
        <?php
        // var_dump($main->getTrains());
        //echo "<br/><br/><br/>";
        // $main->splitWagons();
        ?>
        </pre>
</body>

</html>