<?php
  include('../connection.php');
  include('../response.php');
 

   $json= $_GET['json'];

   $agence= json_decode($json);

    $sql= "DELETE FROM Agence WHERE ID=$agence->id";

    $result=mysqli_query($conn,$sql);

    if($result==true)
    {
      response(1, "Suppression effectuée", NULL);
    }
    else
    {
      response(0, "Erreur survenue pendant la suppression", NULL);
    }

    mysqli_close($conn);
?>