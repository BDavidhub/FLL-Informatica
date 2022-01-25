<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('Main.php');

$main = new Main();

$main->addPrivates(new _Private('Monica.Disaro@FLL.it','Admin','1111111111','Monica','Disaro',1));
$main->addPrivates(new _Private('Filippo.Parovel@FLL.it','Admin','2222222222','Filippo','Parovel',2));
$main->addPrivates(new _Private('Lorenzo.Lashkiba@FLL.it','Admin','3333333333','Lorenzo','Lashkiba',3));
$main->addPrivates(new _Private('Marco.Mattiuz@FLL.it','Admin','4444444444','Marco','Mattiuz',4));
$main->addPrivates(new _Private('Damiano.Gobbo@FLL.it','Admin','5555555555','Damiano','Gobbo',5));

$_SESSION['main'] = $main;
$mail=$_POST['mailLog'];
$password=$_POST['passwordLog'];
$trovato=false;
foreach ($main->getPrivates() as $private)
{
    if($private->getPassword() == $password && $private->getMail() == $mail)
    {
        $_SESSION['mail'] = $_POST['mailLog'];
        $_SESSION['password'] = $_POST['passwordLog'];
        $trovato = true;
    }
}
if($trovato==false)
{
    header('location: ../pages/registration.php?n=1');
exit;
}
 // $hubs=$main->getHubs();
//var_dump($hubs);
//$trains=$main->getTrainS();
//$ws=$hubs['Torino']->getTrainInOutConfig($trains[0]);
//echo $ws;

header('location: ../index.html?n=1');
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

var_dump($main);
        
        //echo "<br/><br/><br/>";
        // $main->splitWagons();
        ?>
        </pre>
</body>

</html>