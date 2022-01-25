
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
<nav class="navbar navbar-expand-lg navbar-light " ><!--style="background-color: rgba(230, 230, 230,0) !important; -->
      <a class="navbar-brand" href="../index.html">
        <h3 class="trainNavbar fw-bold">TRAIN</h3>
      </a>

      <div
        class="collapse navbar-collapse justify-content-end align-content-center m-2"
        id="navbarSupportedContent"
      >
        <ul class="navbar-nav mr-auto p-1 mx-5">
          <li class="nav-item active mx-2">
            <a class="nav-link fw-bolder links-nav" href="#section1">HOME</a>
          </li>

          <li class="nav-item mx-2">
            <a class="nav-link fw-bolder links-nav" href="#section2">ABOUT</a>
          </li>

          <li class="nav-item dropdown mx-2">
            <a
              class="nav-link fw-bold"
              href="#"
              id="navbarDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
            <div class="account-menu">
            <i class="fas fa-bars"></i>
            <div class="outerUser">
            <i class="fas fa-user"></i>
          </div>
            </div>
            </a>
            <div class="dropdown-menu " aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="./pages/registration.php">Registrati</a>
              <a class="dropdown-item" href="./pages/registration.php">Accedi</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="./pages/hubInterface.php">HUB</a>
              <a class="dropdown-item" href="./pages/macchinista.php">Macchinista</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <div class="title1">
    <h1>MACCHINISTA</h1>

    <h4 style="margin-top:2em;">Clicca sulle stazione oer vedere i vagoni da caricare </h4>
    </div>
    <div class="mappa1">
        <div class="percorso1">
            <div class="stazione1" name="UDINE" id="UD">UD</div>
            <div class="stazione1" name="VENEZIA" id="VE">VE</div>
            <div class="stazione1" name="PADOVA" id="PD">PD</div>
            <div class="stazione1" name="MILANO" id="MI">MI</div>
            <div class="stazione1" name="TORINO" id="TO">TO</div>
        </div>
        <div class="rectBlue">
            <h3>UDINE</h3>
            <div class="entrata">
                <h5>Treno entrata</h5>
            </div>
            <div class="uscita">
                <h5>Treno uscita</h5>
            </div>
        </div>
    </div>
    <div class="last-part">

    </div>
 <!-- main.js script  -->
 <script src="../scripts/main.js"></script>
 <script src="../assets/libs/move.js/move.js"></script>
    <script src="../scripts/progressBar.js"></script>
    <script src="../scripts/macchinistaJs.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>