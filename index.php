<?php
session_start();
if(is_null(isset($_SESSION['logged']))){
  $_SESSION['logged'] = false;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
    <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
        <!-- main css  -->
        <link rel="stylesheet" href="src_CSS/main.css" />

        <link
          rel="stylesheet"
          type="text/css"
          href="node_modules/fullpage.js/dist/fullpage.css"
        />
    <title>TrainProject</title>
  </head>

  <body>

     <nav class="navbar navbar-expand-lg navbar-light " >
      <a class="navbar-brand" href="index.php">
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
              <?php 
            
               if(isset($_SESSION['logged']) && $_SESSION['logged']==true){
                echo '<div class="dropdown-divider"></div>';
                if(isset($_SESSION['macchinista']) &&   $_SESSION['macchinista'] == true){
                  echo '<a class="dropdown-item" href="./pages/macchinista.php">Macchinista</a>';
                    
                   }
                if(isset($_SESSION['stazione']) && $_SESSION['stazione'] == true&&$_SESSION['macchinista'] == false){
                  echo '<a class="dropdown-item" href="./pages/hubInterface.php">HUB</a>';
                   }
               
                }
              ?>
              
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <div id="fullpage">

      <div class="section container-fluid">
      <?php  
      if(isset($_SESSION['logged']) && $_SESSION['logged']==true){
         echo  '<h5>Bentornato/a '. $_SESSION['nome'].'!</h5>';
      }
      
       ?>
        <div class="container-fluid scritta">
          <h1 class="display-1 text-center1 text-center fw-bold">SPEDIZIONI ULTRA VELOCI</h1>
          <div class="subtext">
          <p class="text-center fw-bolder text-center1">
            Spedisci in modo semplice, sicuro e veloce grazie ai nostri servizi che consentono di ottenere pacchi o i vagoni in breve tempo.
             Scegli la tratta di ciò che vuoi spedire e continua a seguire il suo stato in tempo reale.
          </p>
        </div>
        </div>
        <form action="php_classes/index.php" method="post">
        <div class="bar1 container-fluid">
          <div class="location">
            <p class="fw-bold">Da dove</p>

           <select class="form-select" name="fdove" id="inputGroupSelect01">
              <option value="Torino" >Torino</option>
              <option value="Firenze">Udine</option>
              <option value="Trento" selected>Milano</option>
              <option value="Udine">Padova</option>
              <option value="Trento">Venezia</option>
            </select>
          </div>
           <div class="check-in">
                <p class="fw-bold">Destinazione</p>

            <select class="form-select" name="fdestinazione" id="inputGroupSelect01">
              <option value="Trento">Milano</option>
              <option value="Udine">Padova</option>
              <option value="Trento" selected>Venezia</option>
              <option value="Trento">Torino</option>
              <option value="Udine">Udine</option>
            </select>
          </div>
          <div class="check-out">
            <nav class="check-out1">
                <p class="fw-bold">Data</p>
            <input type="date" name="fdata" value="<?php  $td = new DateTime(); echo $td->format('Y-m-d'); ?>"
            min="2022-01-01" max="2023-01-01" required>
            </nav>
            <span>
              <input type="submit" value=" "id="searchButton">
              <i class="lni lni-search-alt"></i>
            </span>
          </div> 
                 
        </div>
      </form>
      </div>


      <div class="section container-fluid">

        <div class="wrapper">
          <h1>Scopri di più </h1>
        <ul class="flex cards">
          <li><h2>Registrazione</h2>
            <p>Accedi o se è la prima volta che usufruisci del nostro servizio registrati inserendo nome, cognome, mail e numero di telefono  
            </p></li>
          <li><h2>Spedizione</h2>
            <p>Scegli la tratta del pacco o del vagone che vuoi spedire, non ne hai uno? Nessun problema con il nostro servizio puoi noleggiarne quanti te ne servono 
            </p></li>
          <li><h2>Cosa offriamo</h2>
            <p>Ciò che hai spedito arriverà attraverso i primi treni disponibili e potrai seguirlo in ogni momento grazie al continuo tracciamento
            </p></li>
        </ul>

      </div>
    </div>


    <script
      type="text/javascript"
      src="node_modules/fullpage.js/dist/fullpage.js"
    ></script>

    <script src="scripts/main.js"></script>
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>

  </body>
</html>
