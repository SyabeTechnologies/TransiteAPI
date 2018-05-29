<?php
 
 include ('../connection.php');

 include ('../response.php');

    $json= $_GET['json'];

    $bil = json_decode($json);


    $sql = "SELECT Operation.*, Cash.Montant AS CashMontant, Activite.Libelle AS NomActivite
            FROM Operation
            LEFT OUTER JOIN Cash ON Operation.ID  = Cash.OperationID
            INNER JOIN Activite ON Operation.ActiviteID = Activite.ID
            WHERE Operation.AgenceID = '$bil->agenceid'";

    $result = mysqli_query($conn, $sql);
     
    //tableau crée afficher tout les resultats trouvés
    $req=array();

    foreach($result as $rooi) 
    {
        //inserer une ou plusieurs valeurs à la fin du tableau
        array_push($req, $rooi);                               
    }

    if ($result == true)
    {
        response(1, "Selection effectuee", $req);
    }
    else
    {
        response(0, "Erreur survenue pendant la selection", NULL);
    }

    mysqli_close($conn);

?>
