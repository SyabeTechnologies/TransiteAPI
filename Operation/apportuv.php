<?php
 
 include ('../connection.php');

 include ('../response.php');

 $json= $_GET['json'];

 $transaction = json_decode($json);

    $sql =  "SELECT * FROM Operation WHERE Date = '$transaction->date' AND AgenceID = '$transaction->agenceid' 
    AND ActiviteID = '$transaction->activiteid'  ORDER BY ID DESC LIMIT 1";
     
    $result = mysqli_query($conn, $sql);


    //tableau crée afficher tout les resultats trouvés
    $req=array();

    foreach($result as $rooi) 
    {
        //inserer une ou plusieurs valeurs à la fin du tableau
        array_push($req, $rooi);                               
    }

    if (mysqli_num_rows($result) != 0)
    {

        if($transaction->type == "APPORTUV")
        {
            $uv  = $requv["UV"] - $transaction->montant;


            $sql_operation = "INSERT INTO Operation (UV, Date, Heure, Type, Montant, AgenceID, ActiviteID) 

                            VALUES('$uv', '$transaction->date', '$transaction->heure', '$transaction->type', '$transaction->montant', '$transaction->agenceid', '$transaction->activiteid')";
            
            $result1 = mysqli_query($conn, $sql_operation);

        }
        
        response(1, "Selection effectuee", $req);
    }
    else
    {
        response(0, "UV non initialisé", NULL);
    }

    mysqli_close($conn);

?>
