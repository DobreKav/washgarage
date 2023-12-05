<?php
// update_service.php

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $serviceId = $_POST['service_id'];
    $newServiceName = mysqli_real_escape_string($conn, $_POST['update_service_name']);
    $newServiceDescription = mysqli_real_escape_string($conn, $_POST['update_service_description']);
    $newServicePrice = $_POST['update_service_price'];

    // Update the service in the database
    $updateSql = "UPDATE services SET name='$newServiceName', description='$newServiceDescription', price='$newServicePrice' WHERE id='$serviceId'";

    if ($conn->query($updateSql) === TRUE) {
        header("Location: admin_services.php"); // Redirect to the admin services page
        exit();
    } else {
        echo "Error updating service: " . $conn->error;
    }

    $conn->close();
}
?>
