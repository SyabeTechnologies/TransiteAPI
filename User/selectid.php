<?php
	include('../connection.php');
	include('../response.php');
	//include('../class.php');

   $jsonData = $_GET['json'];

   $user= json_decode($jsonData);
  
    $sql= "SELECT  User.*, Agence.Nom AS NomAgence
    FROM User
    JOIN Agence ON User.AgenceID=Agence.ID AND User.ID=$user->id ";


    $result=mysqli_query($conn,$sql);

     //tableau crée afficher tout les resultats trouvés

    foreach($result as $rooi) 
        {
      //inserer une ou plusieurs valeurs à la fin du tableau
          $req=$rooi;                            
        }

    if($result==true)
    {
    	response(1, "Recherche trouve", $req);
    }
    else
    {
    	response(0, "Erreur survenue pendant la recherche", NULL);
    }

    mysqli_close($conn);
?>