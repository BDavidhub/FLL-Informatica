<?php
    session_start();
    require_once('Main.php');

    $_SESSION = unserialize(serialize($_SESSION));
?>

<html>

<head>
    <title>INDEX DI PROVA</title>
</head>

<body>

    <a href="index.php">
        home
    </a>
    <pre>
        <?php
            $main = $_SESSION['main'];
            $hubs = $main->getHubs();
            //var_dump($_SESSION);
            $trains = $main->getTrains();
            //var_dump($trains);
        ?>
        </pre>
        <form name="infoTrenoHub" action="animazione.php">
        <select name="hub">
            <?php
                foreach($hubs as $key => $hub){
                    echo "<option value=\"".$hub->getId()."\">".$hub->getName()."</option>";
                }
            ?>
        </select>

        <select name="treno">
            <?php
                foreach($trains as $key => $train){
                    echo "<option value=\"".$train->getId()."\">".$train->getDeparture()->getName()." - ".$train->getArrive()->getName()." data: ".$train->getDateTimeDeparture()->format("d/m/Y H:i")."</option>";
                }
            ?>
        </select>
        <input type="submit" name="invia" value="cerca">
    </form>
</body>

</html>