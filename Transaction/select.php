<?php

    include('../connection.php');

    include('../response.php');


$sql =  "SELECT Transaction.*, Activite.Libelle AS Activite, Agence.Nom AS Agence, User.Nom AS User
		   FROM Transaction
		   JOIN Activite ON Transaction.ActiviteID = Activite.ID
		   JOIN Agence ON Transaction.AgenceID = Agence.ID
		   JOIN User ON Transaction.UserID = User.ID"; 


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

		mysqli_close($conn);

		?>
