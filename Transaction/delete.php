    <?php
  include('../connection.php');
  include('../response.php');
  inclue('../log/add_log.php');

   $jsonData = $_GET['json'];

   $transaction= json_decode($jsonData);

    $sql= "DELETE FROM Transaction WHERE ID=$transaction->id";

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