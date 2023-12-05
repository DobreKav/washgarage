<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process the form submission

    // Validate and sanitize user input
    $carModel = filter_var($_POST["carModel"], FILTER_SANITIZE_STRING);
    $serviceType = filter_var($_POST["serviceType"], FILTER_SANITIZE_STRING);

    // Assume a successful booking for this example
    $confirmationMessage = "Thank you for booking! Your car wash for '$carModel' with '$serviceType' service is confirmed.";
} else {
    // If the form is not submitted through POST method, redirect to the home page
    header("Location: index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Car Wash App - Booking Confirmation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.html">Car Wash App</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="services.html">Services</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="text-center">Booking Confirmation</h2>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if (isset($confirmationMessage)): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $confirmationMessage; ?>
                </div>
            <?php else: ?>
                <div class="alert alert-danger" role="alert">
                    Something went wrong. Please try again later.
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
