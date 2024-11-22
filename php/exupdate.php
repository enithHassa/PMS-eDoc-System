<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $amount = $_POST['amount'];
    $description = $_POST['description'];

    $sql = "UPDATE ex_pay SET amount='$amount', description='$description' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Payment updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
