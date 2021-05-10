
<link rel="stylesheet" type="text/css" href= "style1.css">
<?php
    include('config.php');
    $keywords = $_POST['keywords'];
    $sql = "select * from property_info where City='$keywords' or Zip_Code = '$keywords' ";
    $result = mysqli_query($conn,$sql);
    if (!$result){
        die('No Result: '.mysqli_error());

    }
    else{


    echo "<h2>Searching Result</h2>";
    echo "<table border = '1'><tr><td>Address</td><td>City</td><td>State</td><td>Zip Code</td><td>Price</td><td>Features</td><td>Year</td><td>Bedrooms</td><td>Bathrooms</td><td>Square_Feet</td></tr>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr><td>{$row['Address']}</td>";
        echo "<td>{$row['City']}</td>";
        echo "<td>{$row['State']}</td>";
        echo "<td>{$row['Zip_Code']}</td>";
        echo "<td>{$row['Price']}</td>";
        echo "<td>{$row['Features']}</td>";
        echo "<td>{$row['Year']}</td>";
        echo "<td>{$row['Bedrooms']}</td>";
        echo "<td>{$row['Bathrooms']}</td>";
        echo "<td>{$row['Square_Feet']}</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>

<form action="save.php" method="post">
  
  <center>   </center><br>
  <center>   </center><br>
  <center>   </center><br>
  <center>Enter Username and Password to save</center><br>
  <center> <input type="hidden" name = 'keywords' value = "<?php echo $keywords;?>"></center><br>
  <center>E-mail/Username: <input type="text" name="name" ></center><br>
  <center>Password: <input type="password" name = 'pw'></center><br>
  <center><input type="submit" name="Save" value = "Save"></center>
</form>
<a href = "PlaceToLive.html" title = "Homepage" target = "top" style = "position: absolute; left: 1140px;top: 20px">Go to Homepage</a>

