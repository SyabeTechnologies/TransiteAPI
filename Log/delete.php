<?php
    include('../connection.php');
    include('../response.php');

    $json= $_GET['json'];

   $log= json_decode($json);
    
    $sql= "DELETE FROM log WHERE ID=$log->id";

    $result = mysqli_query($conn, $sql);
     
    $req=array();//tableau crée afficher tout les resultats trouvés

    foreach($result as $rooi) 
        {
      //inserer une ou plusieurs valeurs à la fin du tableau
          array_push($req, $rooi);                               
        }
    if ($result == true)
    {

        response(1, "selection effectuee", $req);

    }
    else
    {

        response(0, "Erreur survenue pendant la selection", NULL);

    }

    $row_Clients = mysql_fetch_assoc($result);
    $totalRows_Clients = mysql_num_rows($result);

    mysqli_close($conn);
?>