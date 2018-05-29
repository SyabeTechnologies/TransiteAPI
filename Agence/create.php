<?php
    include('../response.php');
    include('../connection.php');

    $json= $_GET['json'];
    $agence = json_decode($json);


    $sql = "INSERT INTO Agence (Nom,Status) VALUES ('$agence->nom','$agence->status')"; 


    $result = mysqli_query($conn, $sql);


    if ($result == true)
    {

        response(1, "Insertion effectuee", NULL);

    }
    else
    {

        response(0, "Erreur survenue pendant l'insertion", NULL);

    }

    mysqli_close($conn);



?>
                
           