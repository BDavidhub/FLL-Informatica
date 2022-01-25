<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />

  <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet" />

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="../src_CSS/registration.css" />

  <title>Log-in/Register Page</title>
</head>

<body>
  <a class="go-back-btn" href="../index.html">
    <h6> GO BACK </h6>
  </a>
  <div class="login-reg-panel">
    <div class="login-info-box">
      <h2>Hai un account?</h2>
      <p>Clicca accedi per accedere</p>
      <label id="label-register" for="log-reg-show">Accedi</label>
      <input type="radio" name="active-log-panel" id="log-reg-show" checked="checked">
    </div>

    <div class="register-info-box">
      <h2>Non hai un account?</h2>
      <p>Clicca registrati per registrarsi</p>
      <label id="label-login" for="log-login-show">Registrati</label>
      <input type="radio" name="active-log-panel" id="log-login-show">
    </div>

    <div class="white-panel">
      <div class="login-show">
        <h2>ACCEDI</h2>
        <form action="../php_classes/indexLogin.php" method="post">
          <input type="email" placeholder="Email" name="mailLog" class="email">
          <input type="password" placeholder="Password" name="passwordLog">
          <input type="submit" value="Accedi">
        </form>
        <a href="#">Dimenticato la password?</a>
      </div>
      <div class="register-show">
        <h2>REGISTRATI</h2>
        <form action="./reg_Controller.php" method="post">
          <div class="flexBox">
            <input type="text" placeholder="Nome" name="nomeReg" class="nome">
            <input type="text" placeholder="Cognome" name="cognomeReg" class="cognome">
            <input type="tel" placeholder="2453423455" name="teleReg" class="telefono">
            <input type="email" placeholder="Email" name="mailReg" class="email">
            <input type="password" placeholder="Password" name="passwordReg">
            <input type="password" placeholder="Confirm Password" name="passwordCheckReg">

          </div>
          <p>Privato o Azienda?</p>
          <div class="radio-buttons">

            <input type="radio" id="Privato" name="privato" value="privato">
            <label for="privato">Privato</label>

            <input type="radio" id="Azienda" name="azienda" value="Azienda">
            <label for="azienda">Azienda</label>
          </div>
          <input type="submit" value="Registrati">
        </form>
      </div>
    </div>
  </div>

  <script src="../scripts/registration.js"></script>
</body>

</html>