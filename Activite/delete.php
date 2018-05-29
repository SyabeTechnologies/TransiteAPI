<?php
	include('../connection.php');
	include('../response.php');
	

   $json = $_GET['json'];

   $activite= json_decode($json);

    $sql= "DELETE FROM Activite WHERE ID=$activite->id";

    $result=mysqli_query($conn,$sql);

    if($result==true)
    { 
        $code = "004";
        $date = date("Y-m-d");
        $heure=date("H:i:s");
        $message = "Une activite a ete supprimee de l agence " ;
  
        $query_log = "INSERT INTO Log (CodeEvenement, DateEvenement , HeureEvenement, MessageEvenement)
        VALUES ('$code','$date','$heure',' $message')";
  
        $result_log = mysqli_query($conn, $query_log);
        if ($result_log == true)
        { 
        response(1, "Insertion effectuee", NULL);
        }
    }
    else
    {
    	response(0, "Erreur survenue pendant la suppression", NULL);
    }

    mysqli_close($conn);
?>