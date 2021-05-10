<?php
    $dbhost = 'placetolive.chuy0fvfnt0x.us-east-2.rds.amazonaws.com';
    $dbuser = 'onesandohs';
	$dbpass ='ptl-onesandohs-123';
    $conn = mysqli_connect($dbhost,$dbuser,$dbpass);
    if (!$conn){
        echo 'Database Connect unsuccessfully ';
        die("Could not connect: " .mysqli_error());
    }
    echo 'Database Connect successfully';

    mysqli_select_db($conn,"placetolive");
    
?>