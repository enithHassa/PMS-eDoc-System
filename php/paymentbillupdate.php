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
echo '<h2>Update Payment</h2>
    <form action="paymentbillupdate.php" method="post">
        paymentID: <input type="text" name="id"><br><br>
        Email: <input type="text" name="email"><br><br>
        Mob.No: <input type="text" name="number"><br><br>
        <input type="submit" value="Update Payment details">
    </form>';

    //pass values
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $email = $_POST['email'];
        $number = $_POST['number'];
        
        //update the query
        $sql = "UPDATE payment SET email='$email', phone_number='$number' WHERE paymentID=$id";
        
        //print successfully massage
        if ($conn->query($sql) === TRUE) {
            echo 'Payment details updated successfully.<br>';

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    // link viewing page
    echo '<h4><a href="newpaymentdetails.php">View new updated bill.</a></h4>';

    $conn->close();
    //close connection
?>


</div>

</body>
</html>
