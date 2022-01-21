<?php
session_start();
// $host = "sql11.freemysqlhosting.net";
// $datausername = "sql11465630";
// $datapassword = "4uu4l1i4yh";
// $dbname = "sql11465630";
// $connect = mysqli_connect($host, $datausername, $datapassword, $dbname);

$mailReg = $_POST["mailReg"];
$passwordReg = $_POST["passwordReg"];
$passwordCheckReg = $_POST["passwordCheckReg"];

//check password
if ($passwordReg == $passwordCheckReg) {
    echo "<br>" . "YES";
    echo "<br>-" . $_SESSION["connect"];
    //encrypt and save in the database
    $passwordHash = password_hash($passwordReg, PASSWORD_DEFAULT);
    echo "<br>".$passwordHash;
    $query = "INSERT INTO `cliente`(`email`,`password`) VALUES ('$mailReg','$passwordHash');";
    echo "<br>".$query;
    mysqli_query($_SESSION["connect"], $query) or die("4: error. insert query");
    echo "fatto";
    header("location: ../index.html");
    exit;
} else {
    echo "<br>" . "NO";
}

    //check if the mail already exists in the database
    //query if the return == null --> register
?>
