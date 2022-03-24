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
      function sign_up_e($tel, $mail, $psw, $vat, $companyname, $accadress){
        $GLOBALS['connection']->query("insert into users (Mail,Password,Telephone) values('$mail','$psw','$tel');");
        $ris= $GLOBALS['connection']->query("select ID_U from users where(Mail='$mail' AND Password='$psw' AND Telephone='$tel');");
        $row= $ris->fetch(PDO::FETCH_ASSOC);
        $GLOBALS['connection']->query("insert into enterprises values('".$row["ID_U"]."','$vat','$companyname','$accadress');");
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

      //inserise treni nel database e relativi dati
      function insert_train($limit, $departure, $arrival){
        $dated= new DateTime($departure);
        $dated= $dated->format('Y-m-d H:i:s');
        $datea= new DateTime($arrival);
        $datea= $datea->format('Y-m-d H:i:s');
        $GLOBALS['connection']->query("insert into trains (LimitT,DateTimeDeparture,DateTimeArrival) values($limit,'$dated','$datea');");
      }

      //inserire hub e relativi dati
      function insert_hub($name,$capacity){
        $GLOBALS['connection']->query("insert into hubs(NameH,CapacityH) values('$name','$capacity');");
      }

      //inserire numero di passaggio
      function insert_passage($value,$codtrain,$codhub){
        $GLOBALS['connection']->query("insert into passes_by values('$codtrain','$codhub','$value');");
      }

      //tutti gli hub che attraversa un treno
      function hub_passes_by_train($codtrain){
        $GLOBALS['connection']->query("select distinct ID_H,NameH from trains,passes_by,hubs where(trains.ID_T=passes_by.ID_T and passes_by.ID_H=hubs.ID_H and trains.ID_T='$codtrain');");
      }

      //tutti i treni che passano per un hub
      function train_passe_by_hub($codhub){
        $GLOBALS['connection']->query("select distinct ID_T,SerialNumberT from trains,passes_by,hubs where(trains.ID_T=passes_by.ID_T and passes_by.ID_H=hubs.ID_H and trains.ID_T='$codhub');");
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
    //insert_train(10,'11-09-2001 13:30:50','11-09-2003 14:25:45');
    //insert_hub('Venezia',16);
?>
