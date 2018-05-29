
 <?php
	include('../connection.php');
	include('../response.php');


	 $json= $_GET['json'];
    $agence = json_decode($json);


    $sql= "UPDATE Agence SET Nom='$agence->nom', Status='$agence->status'
             WHERE ID='$agence->id'";

    $result=mysqli_query($conn,$sql);

    if($result==true)
    {
    	response(1, "Modification effectuee",NULL);
    }
    else
    {
    	response(0, "Erreur survenue pendant la modification", NULL);
    }

    mysqli_close($conn);
?>
