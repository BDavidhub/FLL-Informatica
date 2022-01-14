<?php

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


    $mailReg = $_POST["mailReg"];
    $passwordReg = $_POST["passwordReg"];
    $passwordCheckReg = $_POST["passwordCheckReg"];

    //check password
    if($passwordReg == $passwordCheckReg){
      echo "<br>"."YES";
      
    }else{
      echo "<br>"."NO";
    }

    //check if the mail already exists in the database
    //query if the return == null --> register




    //encrypt and save in the database
    $passwordHash = password_hash($passwordReg, PASSWORD_DEFAULT);

    // echo "<br>".$passwordReg;
    // echo "<br>".$passwordCheckReg;
    // echo "<br>".$passwordHash1;
    // echo "<br>".$passwordHash2;



?>