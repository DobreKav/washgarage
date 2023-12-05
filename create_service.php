<?php
// create_service.php

include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $serviceName = mysqli_real_escape_string($conn, $_POST['service_name']);
    $serviceDescription = mysqli_real_escape_string($conn, $_POST['service_description']);
    $servicePrice = $_POST['service_price'];

    // Insert new service into the database
    $insertSql = "INSERT INTO services (name, description, price) VALUES ('$serviceName', '$serviceDescription', '$servicePrice')";

    if ($conn->query($insertSql) === TRUE) {
        header("Location: admin_services.php"); // Redirect to the admin services page
        exit();
    } else {
        echo "Error creating service: " . $conn->error;
    }

    $conn->close();
}
?>
