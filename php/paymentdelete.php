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

//take user inputs
echo '<h2>Delete payment</h2><br>
    <form method="POST">
    <label for="id">Enter PaymentID:</label>
    <input type="text" name="id" id="id">
    <input type="submit" value="Delete Payment Details">
    </form>';

//delete payment details in the query
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM payment WHERE paymentID=$id";
    if ($conn->query($sql) === TRUE) {
        echo 'Payment deleted successfully.';
        //header("Location: ../payment.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
//go back to the payment page
echo '<h4><a href="../payment.html">Go back!</a></h4>';

$conn->close();
?>

</div>

</body>
</html>
