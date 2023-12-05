<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'config.php';

    // Sanitize and validate input data
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
    $serviceId = mysqli_real_escape_string($conn, $_POST["service"]);
    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $time = mysqli_real_escape_string($conn, $_POST["time"]);

    // Insert appointment into the database
    $sql = "INSERT INTO appointments (name, email, phone, service_id, date, time) VALUES ('$name', '$email', '$phone', '$serviceId', '$date', '$time')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the homepage after successful submission
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

?>
