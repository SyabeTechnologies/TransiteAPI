<?php
    include('../connection.php');
    include('../response.php');
    
    $sql= "SELECT log.CodeEvenement as code, log.DateEvenement as dateevent, log.HeureEvenement as heure, log.MessageEvenement as message, log.AdresseIP as IP, agence.Nom as nomAgence,  user.Nom as nomUser, log.Type as type, activite.Libelle as libelle
            FROM log
            JOIN user ON log.UserID = user.ID
            JOIN agence ON log.AgenceID = agence.ID
            JOIN activite On log.ActiviteID = activite.ID
            ORDER by code DESC";

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