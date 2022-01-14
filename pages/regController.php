<?php
//  session_start();
// $mailLog = $_POST["mailLog"];
// $passwordLog = $_POST["passwordLog"];

// echo "<br>mail: ".$mailLog;
// echo "<br>Password non encrypted: ".$passwordLog;
// $passwordHash = password_hash($passwordLog,
//       PASSWORD_DEFAULT);
// echo "<br>Password encrypted".$passwordHash;

// $result = password_verify($passwordLog, $passwordHash) ? true : false;

// if($result){
//   echo "<br>SI";
// }else{
//   echo "<br>NO";
// }

//check id, 



$host = "sql11.freemysqlhosting.net";
$datausername = "sql11465630";
$datapassword = "4uu4l1i4yh";
$dbname = "sql11465630";

$connect = mysqli_connect($host, $datausername, $datapassword, $dbname);

$mailReg = $_POST["mailReg"];
$passwordReg = $_POST["passwordReg"];
$passwordCheckReg = $_POST["passwordCheckReg"];

//check password
if ($passwordReg == $passwordCheckReg) {
    echo "<br>" . "YES";
    
    //encrypt and save in the database
    $passwordHash = password_hash($passwordReg, PASSWORD_DEFAULT);
    echo "<br>".$passwordHash;
    $query = "INSERT INTO `cliente`(`email`,`password`) VALUES ('$mailReg','$passwordHash');";
    echo "<br>".$query;
    mysqli_query($connect, $query) or die("4: error. insert query");
    echo "fatto";
    header("location: registration.php");
    exit;
} else {
    echo "<br>" . "NO";
}

    //check if the mail already exists in the database
    //query if the return == null --> register




   

    // echo "<br>".$passwordReg;
    // echo "<br>".$passwordCheckReg;
    // echo "<br>".$passwordHash1;
    // echo "<br>".$passwordHash2;
