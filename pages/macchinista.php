
<?php
// require_once __WEBROOT__ . '/includes/safestring.class.php';
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
    <!-- main css  -->
    <link rel="stylesheet" href="../src_CSS/paginaMacchinista.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- fullpage css nodeModule -->
    <title>TrainProject</title>

</head>
<body>
    <?php
        echo $_SESSION['navbar'];
    ?>
    <div class="title1">
    <h1>MACCHINISTA</h1>
    </div>
    <div class="mappa1">
        <div class="percorso1">
            <div class="stazione1
            ">VE<div class="rectB">

            </div></div>
            <div class="stazione1">VE<div class="rectB">
            <h4>VENEZIA</h4>
            <div class="vagoni">
                <div class="lSide">
                <h6>+1 UD</h6>
                <h6>+1 UD</h6>
                </div>
                <div class="rSide">
                <h6>-1 MI</h6>
                <h6>-1 MI</h6>
                </div>
            </div>
            </div></div>
            <div class="stazione1">VE<div class="rectB">

            </div></div>
            <div class="stazione1">VE<div class="rectB">

            </div></div>
        </div>
    </div>
    <div class="last-part">

    </div>
 <!-- main.js script  -->
 <script src="../scripts/main.js"></script>
    <script src="../scripts/progressBar.js"></script>
    <script src="../scripts/macchinistaJs.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>