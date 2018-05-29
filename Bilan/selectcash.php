<?php
	include('../connection.php');

	include('../response.php');
	
    $json= $_GET['json'];

    $money = json_decode($json);

    $sql = "SELECT *
            FROM Cash
            WHERE Date = '$money->date' AND AgenceID = '$money->agenceid'";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) != 0)
        {
            $toti = mysqli_fetch_assoc($result);

            $roti = $toti['Montant'];
        }
        else
        {
            $roti = 0;
        }

        $sql2 = "SELECT *
                FROM Cash
                WHERE Date = '$money->date' AND AgenceID = '$money->agenceid'";

        $result2 = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result2) != 0)
        {

            while($tota = mysqli_fetch_assoc($result2))
            {
                $rota = $tota['Montant'];
            }
        }
        else
        {
            $rota = 0;
        }

        $diff = $rota - $roti;

        $sql3 = "SELECT *
                FROM Cash
                WHERE Date = '$money->date' AND AgenceID = '$money->agenceid' AND OperationID = 0";

        $result3 = mysqli_query($conn,$sql3);

        $rotu = 0;

        if(mysqli_num_rows($result3) != 0)
        {
            while($totu = mysqli_fetch_assoc($result3))
            {
                $rotu = $rotu + $totu['Cash'];
            }
        }

        $object = (object) ['CashDebut' => $roti, 'CashFin' => $rota, "CashDiff" => $diff, "Apport" => $rotu];

    if($result2 == true)
    {
        response(1, "Recherche trouvé", $object);
    }
    else
    {
        response(0, "Erreur survenue pendant la recherche", NULL);
    }

    mysqli_close($conn);

?>