<?php
$servername = "localhost";
$username = "root";
$password = "mysqlroot";
$dbname = "placetolive";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

$Name =$_POST['name'];
$Email = $_POST['email'];
$sql = "INSERT INTO user_login (Name,Email) VALUES (User_Name,Hashed_Password,Email_Address);

VALUES

('$_POST[name]','$_POST[email]')";
if (mysqli_query($conn, $sql)) {
echo "Insert record successfully";
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
