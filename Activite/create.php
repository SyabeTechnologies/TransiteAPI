<?php

    include('../response.php');
    include('../connection.php');

    $json= $_GET['json'];
    $activite = json_decode($json);


    $sql = "INSERT INTO Activite (Libelle,AgenceID) VALUES ('$activite->libelle', '$activite->agenceid')"; 


    $result = mysqli_query($conn, $sql);


    if ($result == true)
    {
        $code = "003";
        $date = date("Y-m-d");
        $heure=date("H:i:s");
        $message = $activite->libelle . " a ete ajoute a l agence " .$activite->agenceid ;
  
        $query_log = "INSERT INTO Log (CodeEvenement, DateEvenement , HeureEvenement, MessageEvenement)
        VALUES ('$code','$date','$heure',' $message')";
  
        $result_log = mysqli_query($conn, $query_log);
        if ($result_log == true)
        { 
        response(1, "Insertion effectuee", NULL);
        }
    }
    else
    {

        response(0, "Erreur survenue pendant l'insertion", NULL);

    }

    mysqli_close($conn);



?>
                
           