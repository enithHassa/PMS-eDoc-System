<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      background-image: url('../images/pay-phpbg.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    
    .content {
      background-color: rgba(255, 255, 255, 0.9);
      padding: 40px;
      border-radius: 10px;
    }
  </style>
</head>
<body>

<div class="content">
<?php 
// Create connection
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "eDoc";
 
 $conn = new mysqli($servername, $username, $password, $dbname);
 // Check connection
 if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
 }
 else {
   echo '<h6>Its working!!<br></h6>';
 }

//print upadated details
$sql = "SELECT * FROM payment";
$result = $conn->query($sql);

echo '<h2>New Payment Details</h2><br>';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo " PaymentID: " . $row['paymentID'] . " <br><br> Name: " . $row['Card_Holder'] . "<br><br> Email: " . $row['email'] . "<br><br> Mob.no: " . $row['phone_number'] .
         "<br><br> Address: " . $row['Address'] . "<br><br> Country: " . $row['Country'] . "<br><br> Zip: " . $row['Zip_Code'] . "<br><br> Card Number: " . $row['Card_Number'] . "<br><br><br>";
    }
} else {
    echo "No payments found.";
}

$conn->close();
//close connection

//linking the delete page
echo '<h4><a href="paymentdelete.php">If you want to delete payment.</a></h4>';
?>

</div>

</body>
</html>
