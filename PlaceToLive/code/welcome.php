<link rel="stylesheet" type="text/css" href= "style1.css">
<a href = "PlaceToLive.html" title = "Homepage" target = "top" style = "position: absolute; left: 1140px;top: 20px">Go to Homepage</a>

<?php
    include('config.php');
    $email = $_POST['email'];
    $username = $_POST['name'];
    $password = $_POST['pw'];
    $hashed = hash('sha512',$password);
    $sql = "select * from user_login where User_Name = '$username' or Email_Address = '$email' ";
    $result = mysqli_query($conn,$sql);
    if(!$email or !$username or !$password){
        echo "<h2>Sign up Failed, you miss some parts.</h2>";
    }else{
    if (!$result){
        die('No Result: '.mysqli_error());
    }
    if (mysqli_num_rows($result) > 0){
        echo "<h2>user  exists</h2>";
    }
    else{
        echo "<h2>Your account has created</h2>";
        $sql = "insert into user_login (User_Name, Hashed_Password, Email_Address) values ('$username','$hashed','$email')";
        $result1 = mysqli_query($conn,$sql);
        if (!$result1){
            echo "<h2>Sign up failed</h2>";
        }
        else {
            echo "<h2>Sign up successful</h2>";
        }
    }
}


?>