<!-- appointment.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Автоперална Павлинка - Резервирај термин</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<?php include 'config.php'; ?>

<!-- Navbar Section -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Автоперална Павлинка</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Дома</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="appointment.php">Направи Резервирај</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.html">Контактирај не</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="about.php">About Us</a>
            </li> -->
            
        </ul>
    </div>
</nav>

<!-- Appointment Form Section -->
<section class="container mt-5">
    <h2 class="text-center mb-4">Make an Appointment</h2>
    <form action="process_appointment.php" method="post">
        <div class="form-group">
            <label for="name">Your Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Your Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone">Your Phone:</label>
            <input type="tel" class="form-control" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="service">Select Service:</label>
            <select class="form-control" id="service" name="service" required>
                <option value="">Select Service</option>
                <?php
                // Fetch services from the database
                $sql = "SELECT * FROM services";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . " - $" . $row['price'] . "</option>";
                    }
                } else {
                    echo "<option value=''>No services found</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <label for="date">Select Date:</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="form-group">
            <label for="time">Select Time:</label>
            <input type="time" class="form-control" id="time" name="time" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit Appointment</button>
    </form>
    
</section>

<!-- Footer Section -->
<footer class="bg-dark text-white text-center py-3">
    <p>&copy; 2023 Car Wash App. All rights reserved.</p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
