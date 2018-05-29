    <?php
  include('../connection.php');
  include('../response.php');
  include('../class.php');

   $jsonData = $_GET['json'];

   $user= json_decode($jsonData);

    $sql= "DELETE FROM User WHERE ID=$user->id";

    $result=mysqli_query($conn,$sql);

    if($result==true)
    {
      response(1, "Suppression effectuee", NULL);
    }
    else
    {
      response(0, "Erreur survenue pendant la suppression", NULL);
    }

    mysqli_close($conn);
?>