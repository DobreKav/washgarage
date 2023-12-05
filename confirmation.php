<?php
session_start();

// Retrieve booking data from session
$booking = isset($_SESSION["booking"]) ? $_SESSION["booking"] : null;

// Clear the session data
unset($_SESSION["booking"]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Booking Confirmation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center">Booking Confirmation</h1>
    <?php if ($booking): ?>
        <div class="alert alert-success" role="alert">
            <p>Your car wash booking has been confirmed with the following details:</p>
            <p><strong>Car Model:</strong> <?= $booking["carModel"] ?></p>
            <p><strong>Service Type:</strong> <?= $booking["serviceType"] ?></p>
        </div>
    <?php else: ?>
        <div class="alert alert-danger" role="alert">
            <p>Sorry, there was an error processing your booking. Please try again.</p>
        </div>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
