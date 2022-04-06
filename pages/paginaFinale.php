<?php
// require_once __WEBROOT__ . '/includes/safestring.class.php';
session_start();
require_once('../php_classes/Main.php');
$main = unserialize(serialize($_SESSION['main']));
if ($_SESSION['loggedIn'] == 1) {
    $_SESSION['loggedIn'] = 2;
    $_SESSION['flexRadioDefault1'] = $_POST['flexRadioDefault'];
    $_SESSION['noleggioFlex'] = $_POST['noleggioFlex'];
    $_SESSION['numeroOrdinato'] = $_POST['numReg'];
    header('location: acquistaRiepilogo.php?n=4');
}
function write_file1($filename = "../../lego.html")
{
    $handler = fopen($filename, 'w+');
    if (false === $handler) {
        echo "Impossibile aprire il file $filename";
        exit;
    }
    fwrite($handler, "#0-00000110#1-00000000#2-00000110#3-00000110#4-00000010#5-00000111#6-00000000#7-00000000#8-00000000#9-00000000");
    fclose($handler);
}
write_file1();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        @include_once("./includes/header.php");
    ?>  
    <!-- main css  -->
    <link rel="stylesheet" href="../src_CSS/PaginaFinale.css" />

</head>

<body>
    
    <?php
        @include_once("./includes/navbar.php");
    ?>

        <div class="section container-fluid">
            <?php
                @include_once("./includes/firstPart.php");
            ?>
        </div>
        <div class="biglietti-treni">

            <?php
            $arrayindex = $_SESSION['arrayIndex'];
            for ($i = 0; $i < count($arrayindex); $i++) {
                if ($_SESSION['idTrain'] ==  $main->getTrains()[$arrayindex[$i]]->getCod()) {
 
                     $time =  $main->getTrains()[$arrayindex[$i]]->getDateTimeDeparture()->format("H:i") ;
                     $timeAfter = $main->getTrains()[$arrayindex[$i]]->getDateTimeDeparture()->add(new DateInterval("PT1H"))->format("H:i");
                     $departure = $main->getTrains()[$arrayindex[$i]]->getDeparture()->getName();
                     $timeDeparture =  $main->getTrains()[$arrayindex[$i]]->getDateTimeDeparture()->format("d-m-Y") ;
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
                              <p class="title fw-bolder"> RITIRO </p>
                              <p class="small-text">Punto di spedizione</p>
                              <p class="data"><?php echo $timeDeparture; ?></p>
                          </div>
                      </div>
                      <div class="ritiro">
                          <div class="left-side-icon">
                              <img src="../assets/images/homeIcon.png" alt="home icon">
                              <p class="fw-bolder text-uppercase"><?php echo $destination; ?></p>
                          </div>
                          <div class="right-side-icon">
                              <p class="title fw-bolder"> CONSEGNA </p>
                              <p class="small-text">Punto di consegna</p>
                              <p class="data"><?php echo $timeDeparture; ?> </p>
                          </div>
                      </div>
                      <a href="acquista.php?n=2&id='<?php echo $codId; ?>' class="btn-acquista js-next">
                          <h6>
                              ACQUISTA
                          </h6>
                      </a>
                  </div>
                  <?php
                  }
                }
                  ?>
        </div>
            <h4 class="container">SPEDITO!</h4>
        <div class="second-part container-fluid">
            <?php
            for ($i = 0; $i < count($arrayindex); $i++) {
                if ($_SESSION['idTrain'] ==  $main->getTrains()[$arrayindex[$i]]->getCod()) {
                    echo ' <h5> ARRIVERA ALLE ' . $main->getTrains()[$arrayindex[$i]]->getDateTimeDeparture()->format("H:i") . ' DEL ' . $main->getTrains()[$arrayindex[$i]]->getDateTimeDeparture()->format("d-m-Y")  . ' </h5>';
                }
            }
            ?>
        
        </div>

        <?php
        @include_once("./includes/footer.php");
        ?>
</body>

</html>