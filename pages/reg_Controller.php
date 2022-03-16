<?php
session_start();
require_once('../databaseFiles/databaseConnection/operation.php');
echo $_POST["nomeReg"];
$nomeReg = $_POST["nomeReg"];
$cognomeReg = $_POST["cognomeReg"]; 
$teleReg = $_POST["teleReg"];
$mailReg = $_POST["mailReg"];
$passwordReg = $_POST["passwordReg"];
$passwordCheckReg = $_POST["passwordCheckReg"];
$isPrivato = $_POST["privato"];
sign_up($nomeReg,$cognomeReg,$teleReg,$mailReg,$passwordReg,"via gigi1");

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
