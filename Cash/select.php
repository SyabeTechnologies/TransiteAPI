<?php
	include('../connection.php');

	include('../response.php');
	
    $json= $_GET['json'];

    $money = json_decode($json);

    $sql= "SELECT * FROM Cash WHERE Date='$money->date' AND AgenceID='$money->agenceid' ORDER BY ID DESC LIMIT 1";

    $result=mysqli_query($conn,$sql);

     //tableau crée afficher tout les resultats trouvés

    foreach($result as $rooi) 
    {
        //inserer une ou plusieurs valeurs à la fin du tableau
        $req = $rooi;                            
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