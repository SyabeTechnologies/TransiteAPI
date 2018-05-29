<?php
	include('../connection.php');
	include('../response.php');
	

    $json= $_GET['json'];
    $transaction = json_decode($json);

    $sql= "SELECT Transaction.*, Activite.Libelle AS Activite, Agence.Nom AS Agence, User.Nom AS User
            FROM Transaction
            JOIN Activite ON Transaction.ActiviteID = Activite.ID
            JOIN Agence ON Transaction.AgenceID = Agence.ID
            JOIN User ON Transaction.UserID = User.ID
            WHERE Date='$transaction->date' ";

    $result=mysqli_query($conn,$sql);

     //tableau crée afficher tout les resultats trouvés

    foreach($result as $rooi) 
        {
      //inserer une ou plusieurs valeurs à la fin du tableau
          $req=$rooi;                            
        }

    if($result==true)
    {
    	response(1, "Recherche trouvé", $req);
    }
    else
    {
    	response(0, "Erreur survenue pendant la recherche", NULL);
    }

    mysqli_close($conn);
?>