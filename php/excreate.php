<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount = $_POST['amount'];
    $description = $_POST['description'];

    $sql = "INSERT INTO ex_pay (amount, description) VALUES ('$amount', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "Payment created successfully.";
        header("Location: PHP/exread.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
