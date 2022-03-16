<?php
      //cararattere cancer  ``
      $GLOBALS['connection']= null;

      //inserire utente privato  (nome, cognome, tel, mail, password, indirizzodifatturazione)
      function sign_up($name, $surn, $tel, $mail, $psw, $accadress){
        $GLOBALS['connection']->query("insert into users (Mail,Password,Telephone) values('$mail','$psw','$tel');");
        $ris= $GLOBALS['connection']->query("select `ID-U` from users where(Mail='$mail' AND Password='$psw' AND Telephone='$tel');");
        $row= $ris->fetch(PDO::FETCH_ASSOC);
        $GLOBALS['connection']->query("insert into privates values('".$row['ID-U']."','$name','$surn','$accadress');");
      }

      //data mail e password ritornare true se presente nel database, flase se non presente
      function login($mail,$psw){
        $ris=$GLOBALS['connection']->query("select * from users where(Mail='$mail' AND Password='$psw');");
        $row= $ris->fetch(PDO::FETCH_ASSOC);
        if (empty($row)) {
          return 0;
        }else {
          return 1;
        }


      }


      try {
        //instaurazione della connessione
        $hostname = "localhost";
        $dbname = "mysql";
        $user = "root";
        $pass = "";
        $GLOBALS['connection'] = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
        $GLOBALS['connection']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $GLOBALS['connection']->query("use treni_fll;");
      }catch (PDOException $e) {
        echo "Errore: " . $e->getMessage();
        die();
      }

    //  sign_up("pippo","pluto","+396969","pippo@disneyland.it","123456","viadicasamia");
      //login("pippo@dineyland.it", "123456");
      /*  while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
      while ($row = $ris->fetch(PDO::FETCH_ASSOC)){
         print_r($row);
         echo "<br>";
         //echo $row['']."<br />\n";
      }

    */
?>
