<?php

    include('../connection.php');

    include('../response.php');

    $json= $_GET['json'];

    $bilan = json_decode($json);

    $arr = array();

    $sql1 = "SELECT * FROM Activite WHERE AgenceID = '$bilan->agenceid'";

    $result1 = mysqli_query($conn,$sql1);

    foreach ($result1 as $quete)
    {
        $id = $quete['ID'];

        $sql = "SELECT *
                FROM Operation
                WHERE Date = '$bilan->date' AND ActiviteID = '$id' AND AgenceID = '$bilan->agenceid'";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) != 0)
        {
            $toti = mysqli_fetch_assoc($result);

            $roti = $toti['UV'];
        }
        else
        {
            $roti = 0;
        }




        $sql2 = "SELECT *
                FROM Operation
                WHERE Date = '$bilan->date' AND ActiviteID = '$id' AND AgenceID = '$bilan->agenceid'";

        $result2 = mysqli_query($conn,$sql2);

        if(mysqli_num_rows($result2) != 0)
        {
            while($tota = mysqli_fetch_assoc($result2))
            {
                $rota = $tota['UV'];
            }
        }
        else
        {
            $rota = 0;
        }

        $diff = $rota - $roti;




        $sql3 = "SELECT *
                FROM Operation
                WHERE Date = '$bilan->date' AND ActiviteID = '$id' AND AgenceID = '$bilan->agenceid' AND Type = 'APPORTUV'";

        $result3 = mysqli_query($conn,$sql3);

        $rotu = 0;

        if(mysqli_num_rows($result3) != 0)
        {
            while($totu = mysqli_fetch_assoc($result3))
            {
                $rotu = $rotu + $totu['Montant'];
            }
        }




        $sql4 = "SELECT *
                FROM Operation
                WHERE Date = '$bilan->date' AND ActiviteID = '$id' AND AgenceID = '$bilan->agenceid' AND Type = 'DEPOT'";

        $result4 = mysqli_query($conn,$sql4);

        $depot = 0;

        if(mysqli_num_rows($result4) != 0)
        {
            while($tot = mysqli_fetch_assoc($result4))
            {
                $depot = $depot + $tot['Montant'];
            }
        }



        $sql5 = "SELECT *
                FROM Operation
                WHERE Date = '$bilan->date' AND ActiviteID = '$id' AND AgenceID = '$bilan->agenceid' AND Type = 'RETRAIT'";

        $result5 = mysqli_query($conn,$sql5);

        $retrait = 0;

        if(mysqli_num_rows($result5) != 0)
        {
            while($tota = mysqli_fetch_assoc($result5))
            {
                $retrait = $retrait + $tota['Montant'];
            }
        }

        $object = (object) ['Activite' => $quete['Libelle'], 'UVDebut' => $roti, 'UVFin' => $rota, "Diff" => $diff, "Apport" => $rotu, "Depot" => $depot, "Retrait" => $retrait];

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