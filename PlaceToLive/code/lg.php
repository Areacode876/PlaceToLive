<link rel="stylesheet" type="text/css" href= "style1.css">
<?php include('config.php');


    $name=$_POST['name'];
    $psd = $_POST['pw'];
    $hashed = hash('sha512',$psd);
    $sql = "select * from user_login where ( User_Name ='$name' or Email_Address = '$name') and Hashed_Password = '$hashed' ";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)<=0){
    echo "<h2 >No user or username/ password is wrong. <a href='PlaceToLive.html'>Try Sign Up.</a></h2>";
    }else{
     echo '<h2>Login successful</h2> ';
     while($row = mysqli_fetch_assoc($result)){
        echo "<h2>user name: </h2>".$row['User_Name']." <h2>email:</h2> " .$row['Email_Address']." ";
    }
    }
    
?>

<a href = "ManageAccount.html" title = "Manage Account" target = "top" style = "position: absolute; left: 900px;top: 20px">Manage Account</a>
<a href = "PlaceToLive.html" title = "Homepage" target = "top" style = "position: absolute; left: 1140px;top: 20px">Go to Homepage</a>
