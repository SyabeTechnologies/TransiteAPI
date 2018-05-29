<?php

    include('../connection.php');

    include('../class.php');

    include('../response.php');

    $jsonData = $_GET['json'];

   $user= json_decode($jsonData);


    $sql = "UPDATE User SET Nom='$user->nom',Password='$user->password',Pseudo='$user->pseudo' WHERE ID='$user->id'";

    $result = mysqli_query($conn, $sql);
    if ($result == true)
    {

        response(1, "Modification effectuee", NULL);

    }
    else
    {

        response(0, "Erreur survenue pendant la modification", NULL);

    }


    ?>
    
