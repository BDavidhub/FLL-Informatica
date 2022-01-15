<?php
 session_start();

$host = "sql11.freemysqlhosting.net";
$datausername = "sql11465630";
$datapassword = "4uu4l1i4yh";
$dbname = "sql11465630";


$_SESSION["connect"] = mysqli_connect($host, $datausername, $datapassword, $dbname);
echo $_SESSION["connect"];
if (mysqli_connect_errno()) {
    echo "1 : error connection failed";
    exit();
}
$username = $_POST["fdove"];
echo $username;
$query = "INSERT INTO `cliente`(`email`) VALUES ('$username');";

mysqli_query($connect, $query) or die("4: error. insert query");
echo "fatto";

// check if name already exist
// $namecheckquery = " SELECT username FROM user WHERE  username = '" . $username . "';"; 

// $namecheck =  mysqli_query($connect,$namecheckquery) or die("2; name check query faied"); 

// if(mysqli_num_rows($namecheck) != 0)
// {
//     echo "3; name already exist "; // error #3, name already exist cannot register
//     exit();
// }
// // create random ID
// //$id = random_int(10908709,76999877589);


// $insertuserquery = "INSERT INTO `user`(`id`, `username`, `email`, `hash`, `salt`) VALUES (899888989,'$username','llsssssssss','ssddssdsd','sdcsdcsdcsdc');";

// mysqli_query($connect,$insertuserquery) or die("4: error. insert player query");

// echo("0");
