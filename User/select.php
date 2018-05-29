<?php

    include('../connection.php');

    include('../class.php');

    include('../response.php');


$sql =  "SELECT  User.*, Agence.Nom AS NomAgence
		FROM User
		INNER JOIN Agence ON User.AgenceID = Agence.ID";

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
