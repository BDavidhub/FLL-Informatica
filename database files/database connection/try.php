<!DOCTYPE html>
<html lang="it" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Connessione al DATABASE by PDO</title>
  </head>
  <body>
    <?php
    //flag di chiusura connessione
    $fin=0;

      try {
        $hostname = "localhost";
        $dbname = "mysql";
        $user = "root";
        $pass = "";

        //instaurazione connessione
        $conn = $db = new PDO ("mysql:host=$hostname;dbname=$dbname", $user, $pass);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Connected successfully";

        $conn->query("show databases;");
//        $conn->query("create database test2;");
//        $conn->query("drop database test2;");
        $conn->query("use treni_fll;");
        $stmt= $conn->query("describe boxes;");

        //$stmt = $pdo->query("SELECT * FROM users");

        while ($row = $stmt->fetch()) {
            echo $row['']."<br />\n";
        }
      }catch (PDOException $e) {
        echo "Errore: " . $e->getMessage();
        die();
      }

      if ($fin=1) {
        $db=null;
      }


     ?>
  </body>
</html>
