<?php
    include('../response.php');
    include('../connection.php');

    $json= $_GET['json'];
    $operation = json_decode($json);

    $sql =  "SELECT * FROM Operation WHERE Date = '$operation->date' AND AgenceID = '$operation->agenceid' 
    AND ActiviteID = '$operation->activiteid'  ORDER BY ID DESC LIMIT 1";
     
     $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) == 0)
    {

        $sql1 =  "INSERT INTO Operation (UV, Date, Heure, Type, AgenceID, ActiviteID)
        VALUES ('$operation->uv','$operation->date','$operation->heure','$operation->type','$operation->agenceid','$operation->activiteid')";

        $result1 = mysqli_query($conn, $sql1);

        if ($result1 == true)
        {
            response(1, "Insertion effectuee", NULL);     
        }
        else
        {
            response(0, "Erreur survenue pendant l'insertion", NULL);
        }
    }
    else
    {
        response(0, "Insertion impossible, montant UV existe déjà!", NULL);
    }
   
    mysqli_close($conn);

?>
                
           