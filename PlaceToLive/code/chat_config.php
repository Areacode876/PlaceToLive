<?php
ini_set("display_errors","on");
if(!isset($dbh)){
 session_start();
 date_default_timezone_set("UTC"); // Set Time Zone
 $host = "placetolive.chuy0fvfnt0x.us-east-2.rds.amazonaws.com"; // Hostname
 $port = "3306"; // MySQL Port : Default : 3306
 $user = "onesandohs"; // Username Here
 $pass = "ptl-onesandohs-123"; //Password Here
 $db   = "placetolive"; // Database Name
 $dbh  = new PDO('mysql:dbname='.$db.';host='.$host.';port='.$port,$user,$pass);
 
 /*Change The Credentials to connect to database.*/
 include("user_online.php");
}
?>
