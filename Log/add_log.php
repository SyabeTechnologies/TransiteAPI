<?php

    
    function addlog($CodeEvent, $MessageEvent, $CodeAgence, $CodeUtilisateur, $CodeActivite, $Type){
        
        $varLogDate = date('Y-m-d');
        $varLogHeure = date("H:I:S");
        $varCodeEvent = $CodeEvent;
        $varLogMessage = $MessageEvent;
        $varLogCodeAgence = $CodeAgence;
        $varLogCode = $CodeUtilisateur;
        $varLogCodeActivite = $CodeActivite;
        $varLogType = $Type;
        $varLogIP = "192.168.1.2";

        $query_log = "INSERT INTO log (CodeEvenement,DateEvenement,HeureEvenement,MessageEvenement,AdresseIP,AgenceID, UserID, Type, ActiviteID)
            VALUES ('$varCodeEvent','$varLogDate','$varLogHeure','$varLogMessage','$varLogIP','$varLogCodeAgence','$varLogCode', '$varLogType', '$varLogCodeActivite')";

            $result_log = mysqli_query($conn, $query_log);
            

    }
?>