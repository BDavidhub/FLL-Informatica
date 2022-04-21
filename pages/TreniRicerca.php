<?php
// require_once __WEBROOT__ . '/includes/safestring.class.php';
session_start();
require_once('../php_classes/Main.php');
$main = unserialize(serialize($_SESSION['main']));
// preparing array of train ticketes 
$arrayindex = $main->findingTrainsAlgo($_SESSION['dove'], $_SESSION['destinazione'], $_SESSION['data']);

$_SESSION['arrayIndex'] = $arrayindex;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    @include_once("./includes/header.php");
    ?>
    <link rel="stylesheet" href="../src_CSS/secondPage.css" />
</head>

<body>
    <?php @include_once("./includes/navbar.php"); ?>
    <div class="section container-fluid">


        <?php
        @include_once("./includes/firstPart.php");
        if (count($arrayindex) == 0) {
            echo '<h4 class="mt-5"> NO AVAILABLE TRAINS FOUND  </h4><h6> CHANGE THE SELECTION </h6>';

            echo '<img src="../assets/images/sadFace.png" alt="sad face" style="width:300px; height:240px; margin-top:10em;">';
        }
        // echo $main->getTrains()[$arrayindex[0]]->getDeparture();

        for ($i = 0; $i < count($arrayindex); $i++) {

            $time =  $main->getTrains()[$arrayindex[$i]]->getDateTimeDeparture()->format("H:i");
            $timeAfter = $main->getTrains()[$arrayindex[$i]]->getDateTimeDeparture()->add(new DateInterval("PT1H"))->format("H:i");
            $departure = $main->getTrains()[$arrayindex[$i]]->getDeparture()->getName();
            $timeDeparture =  $main->getTrains()[$arrayindex[$i]]->getDateTimeDeparture()->format("d-m-Y");
            $destination = $main->getTrains()[$arrayindex[$i]]->getArrive()->getName();
            $codId = $main->getTrains()[$arrayindex[$i]]->getCod();
        ?>
        <div class="treno-rect">
            <div class="time">
                <h4><?php echo $time; ?></h4>
                <img src="../assets/images/Arrow87.png" alt="arrow">
                <h4><?php echo $timeAfter; ?> </h4>
            </div>

            <div class="ritiro">
                <div class="left-side-icon">
                    <img src="../assets/images/homeIcon.png" alt="home icon">
                    <p class="fw-bolder text-uppercase"> <?php echo $departure; ?></p>
                </div>
                <div class="right-side-icon">
                    <p class="title fw-bolder"> WITHDRAW </p>
                    <p class="small-text">Shipping point</p>
                    <p class="data"><?php echo $timeDeparture; ?></p>
                </div>
            </div>
            <div class="ritiro">
                <div class="left-side-icon">
                    <img src="../assets/images/homeIcon.png" alt="home icon">
                    <p class="fw-bolder text-uppercase"><?php echo $destination; ?></p>
                </div>
                <div class="right-side-icon">
                    <p class="title fw-bolder"> Delivery </p>
                    <p class="small-text">Shipping point</p>
                    <p class="data"><?php echo $timeDeparture; ?> </p>
                </div>
            </div>
            <a href="acquista.php?n=2&id='<?php echo $codId; ?>'" class="btn-acquista js-next">
                <h6>
                    BUY
                </h6>
            </a>
        </div>
        <?php
        }
        ?>

    </div>
    </div>

    <?php
    @include_once("./includes/footer.php");
    ?>
</body>

</html>