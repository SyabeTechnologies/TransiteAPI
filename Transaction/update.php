<?php

    include('../connection.php');

    include('../response.php');

    $jsonData = $_GET['json'];

   $transaction= json_decode($jsonData);

    $sql = "UPDATE Transaction SET  Montant='$transaction->montant', Numero='$transaction->numero', Type='$transaction->type', Frais = '$transaction->frais'
            WHERE ID='$transaction->id'";

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
    
