<?php
 
 include ('../connection.php');

 include ('../response.php');

 $json= $_GET['json'];
 $cash = json_decode($json);

    $sql =  "SELECT * FROM Cash WHERE Date = '$cash->date' AND AgenceID = '$cash->agenceid' 
              ORDER BY ID DESC LIMIT 1";
     
     $result = mysqli_query($conn, $sql);


    //tableau crée afficher tout les resultats trouvés

    foreach($result as $rooi) 
    {
        //inserer une ou plusieurs valeurs à la fin du tableau
      $req= $rooi;                             
    }

    if (mysqli_num_rows($result) != 0)
    {
           $rep = $req["Montant"] + $cash->montant;

           $sql_cash = "INSERT INTO Cash (Date, Heure, Montant, Cash, AgenceID, OperationID)
           VALUES('$cash->date', '$cash->heure', '$rep', '$cash->montant', '$cash->agenceid', '$cash->operationid')";
            
          
           $result1 = mysqli_query($conn, $sql_cash);

           if($result1 == true)
           {
              response(1, "Selection effectuee", $req);
           }
           else
           {
            response(0, "Erreur survenue pendant l'insertion dans la table cash", NULL);
           }

        }
    else
     {
        response(0, "Cash non initialisé", NULL);
     }

    mysqli_close($conn);

?>
