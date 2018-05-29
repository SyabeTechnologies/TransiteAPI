<?php
  include('../connection.php');
	include('../response.php');
	//include('../class.php');

    $jsonData = $_GET['json'];

    $agence= json_decode($jsonData);

    $pseudo = $agence->pseudo;
    $password = $agence->password;

    $pseudo=mysqli_real_escape_string($conn,$pseudo);

    $password=mysqli_real_escape_string($conn,$password);

    $sql= "SELECT User.*, Agence.Nom AS AgenceNom 
           FROM User
           INNER JOIN Agence ON User.AgenceID = Agence.ID 
           WHERE User.Pseudo = '$pseudo' AND User.Password = '$password'";

    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) != 0)
    {
      $toti = mysqli_fetch_assoc($result);

      $roti = $toti['AgenceID'];

      $sql1= "SELECT * FROM Paiement WHERE AgenceID = '$roti'";

      $result1=mysqli_query($conn,$sql1);

      if(mysqli_num_rows($result1) != 0)
      {
        foreach($result1 as $rotu) 
        {
          //Inserer une ou plusieurs valeurs à la fin du tableau
          $reqc = $rotu;                               
        }

        $datefin = $reqc['DateFin'];

        $today = date("Y-m-d");

        if ($datefin >= $today)
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
          response(0, "Veuillez renouveler votre souscription", NULL);
        }

      }
      else
      {
        response(0, "Veuillez acheter une souscription", NULL);
      }

      
    }
    else
    {
      response(0, "Votre pseudo ou mot de passe est invalide, veuillez réessayer", NULL);
    }
    

?>