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
      function insert_train($limit, $departure, $arrival, $number){
        $dated= new DateTime($departure);
        $dated= $dated->format('Y-m-d H:i:s');
        $datea= new DateTime($arrival);
        $datea= $datea->format('Y-m-d H:i:s');
        $GLOBALS['connection']->query("insert into trains (LimitT,DateTimeDeparture,DateTimeArrival,SerialNumberT) values($limit,'$dated','$datea',$number);");
      }

      //inserire hub e relativi dati
      function insert_hub($name,$capacity){
        $GLOBALS['connection']->query("insert into hubs(NameH,CapacityH) values('$name','$capacity');");
      }

      //inserire numero di passaggio
      function insert_passage($value,$codtrain,$codhub){
        $ris=$GLOBALS['connection']->query("select ID_T from trains where(ID_T='$codtrain');");
        $row= $ris->fetch(PDO::FETCH_ASSOC);
        if (! empty($row["ID_T"])) {
          $ris=$GLOBALS['connection']->query("select ID_H from hubs where(ID_H='$codhub');");
          $row= $ris->fetch(PDO::FETCH_ASSOC);
          if (! empty($row["ID_H"])) {
            $GLOBALS['connection']->query("insert into passes_by values('$codtrain','$codhub','$value');");
          }
        }

      }

      //inserimento vagone
      function insert_wagon($capacity, $serialnumber){
        $GLOBALS['connection']->query("insert into wagons(CapacityW,SerialNumberW) values('$capacity','$serialnumber');");
      }

      //inserimento collegamento tra vagone e treno
      function composition_of_train($idtrain,$idwagon,$start,$end){
        $ris=$GLOBALS['connection']->query("select ID_T from trains where(ID_T='$idtrain');");
        $row= $ris->fetch(PDO::FETCH_ASSOC);
        if (! empty($row["ID_T"])) {
          $ris=$GLOBALS['connection']->query("select ID_W from wagons where(ID_W='$idwagon');");
          $row= $ris->fetch(PDO::FETCH_ASSOC);
          if (! empty($row["ID_W"])) {
            $ris=$GLOBALS['connection']->query("select ID_H from hubs where(ID_H='$start');");
            $row= $ris->fetch(PDO::FETCH_ASSOC);
            if (! empty($row["ID_H"])) {
              $ris=$GLOBALS['connection']->query("select ID_H from hubs where(ID_H='$end');");
              $row= $ris->fetch(PDO::FETCH_ASSOC);
              if (! empty($row["ID_H"])) {
                $GLOBALS['connection']->query("insert into has values('$idtrain','$idwagon','$start','$end');");
              }
            }
          }
        }
      }

      //inserimento hub_user
      function insert_hub_user($iduser,$idhub){
          $ris=$GLOBALS['connection']->query("select ID_U from users where(ID_U='$iduser');");
          $row= $ris->fetch(PDO::FETCH_ASSOC);
          if (! empty($row["ID_U"])) {
            $ris=$GLOBALS['connection']->query("select ID_H from hubs where(ID_H='$idhub');");
            $row= $ris->fetch(PDO::FETCH_ASSOC);
            if (! empty($row["ID_H"])) {
              $GLOBALS['connection']->query("insert into usrhubs values('$iduser','$idhub');");
            }
          }
      }
      //inserimento di box
      function insert_box($iduser,$idwagon,$size){
        $ris=$GLOBALS['connection']->query("select ID_U from users where(ID_U='$iduser');");
        $row= $ris->fetch(PDO::FETCH_ASSOC);
        if (! empty($row["ID_U"])) {
          $ris=$GLOBALS['connection']->query("select ID_W from wagons where(ID_W='$idwagon');");
          $row= $ris->fetch(PDO::FETCH_ASSOC);
          if (! empty($row["ID_W"])) {
            $GLOBALS['connection']->query("insert into boxes(Size,ID_U,ID_W) values($size,$iduser,$idwagon);");
          }
        }
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

      //login("pippo@dineyland.it", "123456");
      /*  while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
      while ($row = $ris->fetch(PDO::FETCH_ASSOC)){
         print_r($row);
         echo "<br>";
         //echo $row['']."<br />\n";
      }
    */

    //sign_up_p("pippo","pluto","+396969","pippo@disneyland.it","123456","viadicasamia");
    //sign_up_e("+39399966","pippo@bello.it","123456","abcdefg","albertice&co","vertexhouseinthevertexcity");
    //insert_train(10,'11-09-2001 13:30:50','11-09-2003 14:25:45',16784);
    //insert_hub('Venezia',16);
    //insert_hub('Treviso',17);
    //insert_wagon(11,11123);
    //insert_passage(10,3,2);
    //composition_of_train(3,3,2,3);
    //insert_hub_user(36,2);
    //insert_box(36,3,10);
    //hello

?>
