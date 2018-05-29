<?php
  include('../connection.php');
	include('../response.php');
	//include('../class.php');

    $jsonData = $_GET['json'];

    $user= json_decode($jsonData);

    $pseudo=$user->pseudo;

    $sql= "SELECT * FROM user where Pseudo='$pseudo' ";

    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) != 0)
    {

      foreach($result as $rooi) 
      {
          //Inserer une ou plusieurs valeurs à la fin du tableau
          $req = $rooi;                               
      }

      response(1, "Recherche trouvé", $req);
    
    }
    else
    {
      response(0, "Erreur survenue pendant la recherche", NULL);
    }
    

?>