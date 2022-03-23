<?php
      //cararattere cancer  ``
      $GLOBALS['connection'] = null;

      //inserire utente privato  (nome, cognome, tel, mail, password, indirizzodifatturazione)
      function sign_up_p($name, $surn, $tel, $mail, $psw, $accadress){
        $GLOBALS['connection']->query("insert into users (Mail,Password,Telephone) values('$mail','$psw','$tel');");
        $ris= $GLOBALS['connection']->query("select ID_U from users where(Mail='$mail' AND Password='$psw' AND Telephone='$tel');");
        $row= $ris->fetch(PDO::FETCH_ASSOC);
        $GLOBALS['connection']->query("insert into privates values('".$row["ID_U"]."','$name','$surn','$accadress');");
      }

      //inserire utente azienda (mail, password, telephone, vat, companyname, indirizzodifatturazione)
      function sign_up_e($tel, $mail, $psw, $vat, $companyname, $accadresse){
        $GLOBALS['connection']->query("insert into users (Mail,Password,Telephone) values('$mail','$psw','$tel');");
        $ris= $GLOBALS['connection']->query("select ID_U from users where(Mail='$mail' AND Password='$psw' AND Telephone='$tel');");
        $row= $ris->fetch(PDO::FETCH_ASSOC);
        $GLOBALS['connection']->query("insert into enterprises values('".$row["ID_U"]."','$vat','$companyname','$accadresse');");
      }

      //data mail e password ritornare true se presente nel database, flase se non presente
      function login($mail, $psw){
        $ris=$GLOBALS['connection']->query("select ID_U from users where(Mail='$mail' AND Password='$psw');");
        $row= $ris->fetch(PDO::FETCH_ASSOC);
        if (empty($row["ID_U"])) {
          return 0;
        }else {
          return 1;
        }
      }

      //inserise dati dei treni
      function insert_train($limit, $departure){

      }


      try {
        //instaurazione della connessione
        $hostname = "localhost";
        $dbname = "mysql";
        $user = "root";
        $pass = "root";
        $GLOBALS['connection'] = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);
        $GLOBALS['connection']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $GLOBALS['connection']->query("use treni_fll;");
      }catch (PDOException $e) {
        echo "Errore: " . $e->getMessage();
        die();
      }

      //sign_up_p("pippo","pluto","+396969","pippo@disneyland.it","123456","viadicasamia");
      //sign_up_e("+39399966","pippo@bello.it","123456","abcdefg","albertice&co","vertexhouseinthevertexcity");
      //login("pippo@dineyland.it", "123456");
      /*  while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
      while ($row = $ris->fetch(PDO::FETCH_ASSOC)){
         print_r($row);
         echo "<br>";
         //echo $row['']."<br />\n";
      }

    */
?>
