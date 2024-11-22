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

// passing form values
$Uname = $_POST["fname"];
$Uemail = $_POST["femail"];
$Uaddress = $_POST["faddress"];
$Ucity = $_POST["fcity"];
$Unumber = $_POST["fnumber"];
$Uzip = $_POST["fzip"];
$Ucardnum = $_POST["fcnum"];

echo "* <br>";

//insert data to the table
$sql = "INSERT INTO payment (Card_Holder, email, phone_number, Address, Country, Zip_Code, Card_Number)
VALUES ('$Uname', '$Uemail', '$Unumber', '$Uaddress', '$Ucity', '$Uzip', '$Ucardnum')";

echo "** <br>";

//check validation
if ($conn->query($sql) === TRUE) {
  echo "Payment created successfully.";
  header("Location: paymentbill.php"); //redirect to the bill page
  exit;
} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "*** <br>";

mysqli_close($conn);
// close connection
?>

  <!--take user inputs-->
  <form method="POST">
    <label for="paymentID">Enter PaymentID:</label>
    <input type="text" name="paymentID" id="paymentID">
    <input type="submit" value="View Payment Details">
  </form>
 <!--link upadate page-->
  <a class="viewbill" href="paymentbillupdate.php" style="color: black;"><b><br>Update payment Details</b></a>
</div>

</body>
</html>
