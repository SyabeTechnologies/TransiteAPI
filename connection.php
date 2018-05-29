<?php 
    $dbhost = 'localhost';

    $dbuser = 'root';

    $dbpass = 'root';
            
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'TransApp');

    if (mysqli_connect_errno())
	 {
	 	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	 }
	 
?>

