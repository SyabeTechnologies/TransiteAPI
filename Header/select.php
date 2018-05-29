<?php

    include('../connection.php');

    include('../response.php');

    $json= $_GET['json'];

    $cash = json_decode($json);

    $arr = array();

    $sql1 = "SELECT * FROM Activite WHERE AgenceID = '$cash->agenceid'";

    $result1 = mysqli_query($conn,$sql1);

    foreach ($result1 as $quete)
    {

        $id = $quete['ID'];

        $sql = "SELECT * FROM Operation WHERE Date = '$cash->date' AND ActiviteID = '$id' AND AgenceID = '$cash->agenceid' ORDER BY ID DESC LIMIT 1";

        $result = mysqli_query($conn,$sql);

        $roti = NULL;

        if($result==true)
        {
            foreach($result as $toti)
            {
                $roti = $toti;
            }
        }

        $object = (object) ['Activite' => $quete, 'UV' => $roti];

        array_push($arr, $object);
    }


    if($result1==true)
    {
        response(1, "Recherche trouvé", $arr);
    }
    else
    {
        response(0, "Erreur survenue pendant la recherche", NULL);
    }

    mysqli_close($conn);
    
?>