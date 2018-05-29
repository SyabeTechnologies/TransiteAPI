<?php
	include('../connection.php');
	include('../response.php');
	

    $json= $_GET['json'];
    $agence = json_decode($json);

    $sql= "SELECT * FROM Agence where ID=$agence->id ";

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