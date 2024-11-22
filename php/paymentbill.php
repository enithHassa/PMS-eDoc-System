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
  // create connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "eDoc";

  $conn = new mysqli($servername, $username, $password, $dbname);
  //check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } else {
    echo '<h6>It\'s working!!<br></h6>';
  }

  // Check if the user has submitted a paymentID
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['paymentID'])) {
      $paymentID = $_POST['paymentID'];
    // Query the database for the payment details with the specified paymentID
      $sql = "SELECT * FROM payment WHERE paymentID = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $paymentID);
      $stmt->execute();
      $result = $stmt->get_result();
    //take data from the query and print
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<h2>Payment Details</h2><br>';
          echo " PaymentID: " . $row['paymentID'] . " <br><br> Name: " . $row['Card_Holder'] . "<br><br> Email: " . $row['email'] . "<br><br> Mob.no: " . $row['phone_number'] .
            "<br><br> Address: " . $row['Address'] . "<br><br> Country: " . $row['Country'] . "<br><br> Zip: " . $row['Zip_Code'] . "<br><br> Card Number: " . $row['Card_Number'] . "<br><br>";
        }
      } else {
        echo "No payment with the specified PaymentID found.";
      }

      $stmt->close();
    }
  }
  $conn->close();
  //close connection
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
