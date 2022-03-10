<?php
session_start();

$_SESSION["nomeReg"] = $_POST["nomeReg"];
$_SESSION["cognomeReg"] = $_POST["cognomeReg"];
$_SESSION["nomeReg"] = $_POST["nomeReg"];   
$_SESSION["teleReg"] = $_POST["teleReg"];
$_SESSION["mailReg"] = $_POST["mailReg"];
$_SESSION["passwordReg"] = $_POST["passwordReg"];
$_SESSION["passwordCheckReg"] = $_POST["passwordCheckReg"];
$_SESSION["privato"] = $_POST["privato"];
$_SESSION["azienda"] = $_POST["azienda"];

//check password
//  if ($passwordReg == $passwordCheckReg) {
//      echo "<br>" . "YES";
//      echo "<br>-" . $_SESSION["connect"];
//      //encrypt and save in the database
//      $passwordHash = password_hash($passwordReg, PASSWORD_DEFAULT);
//      echo "<br>".$passwordHash;
//      $query = "INSERT INTO `cliente`(`email`,`password`) VALUES ('$mailReg','$passwordHash');";
//      echo "<br>".$query;
//      mysqli_query($_SESSION["connect"], $query) or die("4: error. insert query");
//      echo "fatto";
//      header("location: ../index.html");
//      exit;
//  } else {
//      echo "<br>" . "NO";
//  }

    //check if the mail already exists in the database
    //query if the return == null --> register
?>
