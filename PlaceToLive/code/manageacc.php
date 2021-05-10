<a href = "PlaceToLive.html" title = "Homepage" target = "top" style = "position: absolute; left: 1140px;top: 20px">Go to Homepage</a>
<?php include('config.php');
    $username = $_POST['name'];
    $fn = $_POST['First_Name'];
    $ln = $_POST['Last_Name'];
    $ut = $_POST['User_Type'];
    $ad = $_POST['Address'];
    $ci = $_POST['City'];
    $st = $_POST['State'];
    $zc = $_POST['Zip_Code'];
    $pn = $_POST['Phone_Number'];
    $gn = $_POST['Gender'];
    $ms = $_POST['Marital_Status'];
    $op = $_POST['opw'];
    $np = $_POST['npw'];
    $hashedo = hash('sha512',$op);
    $hashedn = hash('sha512',$np);
    $sql = "select * from user_login where User_Name ='$username' and Hashed_Password = '$hashedo' ";
    $result = mysqli_query($conn,$sql);
    if (!$username or !$fn or !$ln or !$ut or !$ad or !$ci or !$st or !$zc or !$pn or !$gn or !$ms or !$op or !$np){
        echo "<h2>Update Information Failed, you miss some parts </h2>";
    }
    else{
        if ($ut != 'Buyer' or $ut != 'Seller' or $ut != 'Renter' or $ut != 'Realtor' ){
            $utid = 0;
        }else{
            if ($ut = 'Buyer'){
                $utid = 1;
            }
            if ($ut = 'Seller'){
                $utid = 2;
            }
            if ($ut = 'Renter'){
                $utid = 3;
            }
            if ($ut = 'Realtor'){
                $utid = 4;
            }

        }
    if(mysqli_num_rows($result)<=0){
    echo "<h2 > username/ password is wrong. </h2>";
    }else{
        while($row = mysqli_fetch_assoc($result)){
            $uid = (int) $row['UserID'];
        }
        if (($gn == 'Male' or $gn == 'Female' or $gn == 'Secret') and  ($ms == 'Single' or $ms == 'Married' or $ms == 'Divorced' ) ){
            $sql = "select * from user_info where UserID = '$uid'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)<=0){
                $sql = "insert into user_info (UserID, TypeID,First_Name, Last_Name,Address, City, State, Zip_Code, Phone_Number, Gender, Marital_Status  ) values ('$uid','$utid' ,'$fn', '$ln', '$ad', '$ci','$st','$zc','$pn','$gn','$ms' )";
                $result = mysqli_query($conn,$sql);
                if (!$result){
                    echo '<h2>Insert error1</h2>';
                }
                else{
                    $sql = "update user_login set Hashed_Password = '$hashedn' where User_Name = '$username'";
                    $result = mysqli_query($conn,$sql);
                    if (!$result){
                        echo '<h2>Modify error2</h2>';
                    }
                    else{
                        echo '<h2>Modify success</h2>';
                    }
                }

            }
            else{
                $sql = "update user_info set TypeID = '$utid', First_Name = '$fn', Last_Name = '$ln',Address = '$ad', City = '$ci', State = '$st', Zip_Code = '$zc', Phone_Number = '$pn', Gender = '$gn', Marital_Status = '$ms' where UserID = '$uid' ";
                $result = mysqli_query($conn,$sql);
                if (!$result){
                    echo '<h2>update error</h2>';
                }
                else{
                    $sql = "update user_login set Hashed_Password = '$hashedn' where User_Name = '$username'";
                    $result = mysqli_query($conn,$sql);
                    if (!$result){
                        echo '<h2>Modify error4</h2>';
                    }
                    else{
                        echo '<h2>Modify success</h2>';
                    }
                }
            }
        }
        else{
            echo "<h2 > Gender or Marital_Status is wrong. </h2>";
        }
    }
}
?>
<link rel="stylesheet" type="text/css" href= "style1.css">    
            