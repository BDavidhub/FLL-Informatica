<?php
// require_once __WEBROOT__ . '/includes/safestring.class.php';
session_start();

require_once('../php_classes/Main.php');
$main = unserialize(serialize($_SESSION['main']));
$_SESSION['idTrain'] = $_REQUEST['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    @include_once("./includes/header.php");
    ?>
    <!-- main css  -->
    <link rel="stylesheet" href="../src_CSS/AcquistaPage.css" />


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

    <div class="section1 container-fluid">
        <!-- <form action="acquistaNext.php" method="post"> -->
        <div class="left-side container-fluid">
            <h2>TYPE OF SPEDITION</h2>
            <h6>Chose the type of spedition, box or wagon</h6>
            <div class="bottoni">
                <?php
                echo   '<a href="acquistaPa&Va.php?n=3&id=' . $_SESSION['idTrain'] . '&t=package"" name="pacco">PACKAGE</a>';
                echo '<a href="acquistaPa&Va.php?n=3&id=' . $_SESSION['idTrain'] . '&t=wagon"" name="vagone">WAGON</a>';
                ?>
            </div>
        </div>
        <!-- </form> -->

    </div>
    </div>
    <?php
    @include_once("./includes/footer.php");
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

</body>

</html>