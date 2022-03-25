<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../src_CSS/hubInterface.css" />
  <link rel="stylesheet" href="../src_CSS/navBar.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <title>Hub</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="../index.php">

      <h3 class="trainNavbar fw-bold">TRAIN</h3>
    </a>

    <div class="collapse navbar-collapse justify-content-end align-content-center m-2" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto p-1 mx-5">
        <li class="nav-item active mx-2">
          <a class="nav-link fw-bolder links-nav" href="../index.php#section1">HOME</a>
        </li>

        <li class="nav-item mx-2">
          <a class="nav-link fw-bolder links-nav" href="../index.php#section2">ABOUT</a>
        </li>
      </ul>
    </div>
  </nav>


  <div class="info">
    <article id="aW">
      
    </article>
    <article id="lW">
      
    </article>
  </div>
  <div class="yourStaz" id="stazTit"></div>
  <div class="wrap">
    <section class="top">
      <div id="v0"></div>
      <div class="wagon sw" id="v1"></div>
      <div class="wagon sw" id="v2"></div>
      <div class="wagon sw" id="v3"></div>
      <div class="wagon sw" id="v4"></div>
      <div class="wagon sw" id="v5"></div>
      <div class="wagon sw" id="v6"></div>
      <div class="wagon sw" id="v7"></div>
      <div class="wagon sw" id="v8"></div>
      <div class="wagon sw" id="v9"></div>
      <div class="wagon sw" id="v10"></div>
      <div id="v11"></div>
      <div class="rail" id="rail1"></div>
    </section>

    <section class="bottom">
      <div id="t0" class="head_sx"></div>
      <div class="wagon tw" id="t1"></div>
      <div class="wagon tw" id="t2"></div>
      <div class="wagon tw" id="t3"></div>
      <div class="wagon tw" id="t4"></div>
      <div class="wagon tw" id="t5"></div>
      <div class="wagon tw" id="t6"></div>
      <div class="wagon tw" id="t7"></div>
      <div class="wagon tw" id="t8"></div>
      <div class="wagon tw" id="t9"></div>
      <div class="wagon tw" id="t10"></div>
      <div id="t11" class="head_dx"></div>
      <div class="rail" id="rail2"></div>
    </section>

    <section class="bin">
      <div class="rail" id="rail3"></div>
    </section>



  </div>
  <div class="buttons">
    <!-- <button id="reset" class="btn btn-primary" onclick="reset()">RESET</button><br />
    <button id="updateTrain" class="btn btn-primary" onclick="callUpdateTrain()">updateTrain</button><br />
    <button id="removeWagons" class="btn btn-primary" onclick="callRemoveWagons()">removeWagons</button><br />
    <button id="addWagons" class="btn btn-primary" onclick="callAddWagons()">addWagons</button><br />
    <button id="trainDeparture" class="btn btn-primary" onclick="trainDeparture()">trainDeparture</button><br /> -->
    <button id="start123" class="btn btn-primary">-Start-</button><br />
  </div>
<!-- 
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
  <script src="../assets/libs/jQuery.min.js"></script>
  <script type="module" src="../scripts/hubController.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="../assets/libs/move.js/move.js"></script>
  

</body>

</html>