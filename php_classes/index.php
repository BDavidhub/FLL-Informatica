<?php
    require_once('Main.php');
    echo '<pre>';

    $main = new Main();

    $main->addTrain(new Train('Udine','Torino',$main->reset()));
    $main->addTrain(new Train('Trento','Firenze',$main->reset()));
    $main->addTrain(new Train('Torino','Udine',$main->reset()));
    $main->addTrain(new Train('Firenze','Trento',$main->reset()));

    $boxes[] = new Box('Treviso','Bologna',$main->reset());
    $boxes[] = new Box('Padova','Milano',$main->reset());
    $boxes[] = new Box('Torino','Milano',$main->reset());

    $main->distributeBoxesInWagons($boxes);
    $main->distributeWagonsInTrains();

    echo '</pre>';
?>

<html>
    <head>
        <title>INDEX DI PROVA</title>
    </head>
    <body>
        <pre>
        <?php
           var_dump($main->getTrains());
            //echo "<br/><br/><br/>";
           // $main->splitWagons();
        ?>
        </pre>
    </body>
</html>