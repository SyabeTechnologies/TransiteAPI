<?php
 
 include ('../connection.php');

 include ('../response.php');

 $json= $_GET['json'];
 $operation = json_decode($json);

    $sql =  "SELECT * FROM Operation WHERE Date = '$operation->date' AND AgenceID = '$operation->agenceid' 
    AND ActiviteID = '$operation->activiteid'  ORDER BY ID DESC LIMIT 1";
     
     $result = mysqli_query($conn, $sql);


    //tableau crée afficher tout les resultats trouvés
    

    foreach($result as $rooi) 
    {
        //inserer une ou plusieurs valeurs à la fin du tableau
        $req = $rooi;                               
    }

    if ($result == true)
    {  
            $uv  = $req["UV"] + $operation->montant;


              $sql_operation= "INSERT INTO Operation (UV, Date, Heure, Montant, Type, AgenceID, ActiviteID) 

            VALUES('$uv', '$operation->date', '$operation->heure', '$operation->montant', '$operation->type',  '$operation->agenceid', '$operation->activiteid')";
            
            $result1 = mysqli_query($conn, $sql_operation);

        if($result1)
        {
        response(1, "Selection effectuee", $req);
        }
        else
        {
            response(0, "Erreur survenue pendant la selection", NULL);
        }
    }
    else
    {
        response(0, "Erreur survenue pendant la selection", NULL);
    }

    mysqli_close($conn);

?>
