<?php
    include('../response.php');

    include('../connection.php');

    $json= $_GET['json'];

    $cash = json_decode($json);

    $sql =  "SELECT * FROM Cash WHERE Date = '$cash->date' AND AgenceID = '$cash->agenceid'
    ORDER BY ID DESC LIMIT 1";
     
     $result = mysqli_query($conn, $sql);


    if (mysqli_num_rows($result) == 0)
    {
        $sql1 = "INSERT INTO Cash (Date, Heure, Montant, Cash, AgenceID) 
        VALUES ('$cash->date', '$cash->heure', '$cash->montant', '$cash->montant','$cash->agenceid')"; 
    
        $result1 = mysqli_query($conn, $sql1);

        if ($result1 == true)
        {
            response(1, "Insertion effectuee", NULL);     
        }
        else
        {
            response(0, "Erreur survenue pendant l'insertion", NULL);
        }
            
    }
    else
    {
        response(0, "nsertion impossible, montant du cash existe déjà!", NULL);
    }
   

    mysqli_close($conn);



?>
                
           