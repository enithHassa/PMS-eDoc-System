<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eDoc";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else {
  echo '<h6>Its working!!<br></h6>';
}

?>