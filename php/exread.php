<?php
include 'config.php';

$sql = "SELECT * FROM ex_pay";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . " - Amount: " . $row['amount'] . " - Description: " . $row['description'] . "<br>";
    }
} else {
    echo "No payments found.";
}

$conn->close();
?>
