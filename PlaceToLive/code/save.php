<link rel="stylesheet" type="text/css" href= "style1.css">
<a href = "PlaceToLive.html" title = "Homepage" target = "top" style = "position: absolute; left: 1140px;top: 20px">Go to Homepage</a>

<?php include('config.php');

    $name=$_POST['name'];
    $psd = $_POST['pw'];
    $keywords = $_POST['keywords'];
    $hashed = hash('sha512',$psd);
    $sql = "select * from user_login where ( User_Name ='$name' or Email_Address = '$name') and Hashed_Password = '$hashed' ";
    $result = mysqli_query($conn,$sql);
    if(!$result){
        echo 'Error';
    }
    else{
    if(mysqli_num_rows($result)<=0){
    echo "<h2 >No user or username/ password is wrong. <a href='PlaceToLive.html'>Try Sign Up.</a></h2>";
    }else{
        echo '<h2>Login successful</h2> ';
        while($row = mysqli_fetch_assoc($result)){
        echo "<h2>user name: </h2>".$row['User_Name']." <h2>email:</h2> " .$row['Email_Address']." ";
        $uid = $row['UserID'];
        $sql1 = "select * from property_info where City='$keywords' or Zip_Code = '$keywords' ";
        $result1 = mysqli_query($conn,$sql1);
        if (!$result){
            die('Cannot save. No Result: '.mysqli_error());
    
        }
        else{
            while($row1 = mysqli_fetch_assoc($result1)){
                $pid= $row1['PropertyID'];
                $sql2 = "insert into user_save (UserID,PropertyID) values('$uid','$pid') ";
                $result2 =  mysqli_query($conn,$sql2);
                if (!$result2){
                    echo "<h1>Already saved</h1>";
                }
                else{
                    echo "<h1>Save Successful</h1> ";
                }
            }
        }
    }
}
}
?>