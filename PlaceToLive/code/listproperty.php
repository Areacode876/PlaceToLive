<a href = "PlaceToLive.html" title = "Homepage" target = "top" style = "position: absolute; left: 1140px;top: 20px">Go to Homepage</a>
<?php
include('config.php');
    $pt = $_POST['type'];
    $ad = $_POST['Address'];
    $ci = $_POST['City'];
    $st = $_POST['State'];
    $zc = $_POST['Zip_Code'];
    $pr = $_POST['Price'];
    $fe = $_POST['Features'];
    $yr = $_POST['Year'];
    $be = $_POST['Bedrooms'];
    $ba = $_POST['Bathrooms'];
    $se = $_POST['Square_Feet'];
    if(!$pt or !$ad or !$ci or !$st or !$zc or !$pr or !$fe or !$yr or !$be or !$ba or !$se){
        echo "<h2>You miss some parts. Add Failed</h2>";

    }else{
    if ($pt != 'House'and $pt != 'Apartment' and $pt !='Townhouse' ){
        $ptid = 0;

    }else{
        if ($pt == 'House'){
            $ptid = 1;
        }
        if ($pt == 'Apartment'){
            $ptid = 2;
        }
        if ($pt == 'Townhouse'){
            $ptid = 3;
        }
    }   
    $sql = "insert into property_info (PtypeID, Address,City, State,  Zip_Code, Price, Features, Year, Bedrooms, Bathrooms, Square_Feet ) values('$ptid','$ad', '$ci','$st','$zc','$pr','$fe', '$yr', '$be', '$ba', '$se')";
    $result = mysqli_query($conn,$sql);
    if (!$result){
        echo '<h2>Insert error1</h2>';
    }
    else{
        echo '<h2>Insert successful</h2>';
    }
    
}

?>
<link rel="stylesheet" type="text/css" href= "style1.css">