<?php

    include('../connection.php');

    include('../response.php');
    //insertion de notre json via URL
    $jsonData = $_GET['json'];

   $user= json_decode($jsonData);
  
    //affectation des variables contenu dans jsonData
    $sql = "INSERT INTO User (Nom,Password,Pseudo,AgenceID) 
            VALUES ('$user->nom','$user->password','$user->pseudo','$user->agenceid' )"; 

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
                
           