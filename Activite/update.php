
 <?php
	include('../connection.php');
	include('../response.php');

	 $json= $_GET['json'];
    $activite = json_decode($json);


    $sql= "UPDATE Activite SET Libelle='$activite->libelle' WHERE ID='$activite->id'";

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
