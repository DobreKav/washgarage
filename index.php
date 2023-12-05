<!-- index.php -->
<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Автоперална Павлинка</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
    <style>
    .gallery-image {
        width: 100%;
        height: 200px; /* Adjust the height as needed */
        object-fit: cover;
    }

    .gallery-image:hover {
        opacity: 0.8;
        /* Add any additional hover styles as desired */
    }
</style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Автоперална Павлинка</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Дома</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="services.html">Услуги</a>
                </li> -->
                <li class="nav-item">
                    <button class="btn btn-primary nav-link" onclick="location.href='login.php';">Најава</button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Контакт</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="appointment.php">Резервирај термин</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Header Section -->
    <header class="bg-light text-center py-5 animated fadeIn" style="background-image: url('images/1.jpg'); background-size: cover; color: #fff;">
        <h1 class="display-4">Добредојдовте во нашиот сервис за миење автомобили</h1>
        <p class="lead">
            Квалитетни услуги за чистење на автомобили и детали за блескаво чисто возење.
        </p>
    </header>

    <!-- Image Gallery -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Галерија</h2>
    <div class="row">
        <?php
        // Fetch images from the gallery folder
        $imageFolder = 'images/';
        $images = glob($imageFolder . '*.{jpg,gif}', GLOB_BRACE);

        foreach ($images as $image) {
            ?>
            <div class="col-md-4">
                <a href="<?php echo $image; ?>" data-lightbox="image-gallery" data-title="Image">
                    <img src="<?php echo $image; ?>" class="img-fluid rounded gallery-image" alt="Gallery Image">
                </a>
            </div>
            <?php
        }
        ?>
    </div>
</div>

    <!-- Services Section -->
    <section class="container mt-5">
        <h2 class="text-center mb-4">Услуги</h2>
        <div class="row">
            <?php
            // Fetch services from the database
            $sql = "SELECT * FROM services";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-md-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                <p class="card-text"><?php echo $row['description']; ?></p>
                                <p class="card-text">Price: $<?php echo $row['price']; ?></p>
                                <button class="btn btn-primary btn-block" data-toggle="modal" data-target="#addToCartModal">
                                    Додади во кошница
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "No services found.";
            }
            ?>
        </div>
    </section>

    <!-- Cart Modal -->
    <div class="modal fade" id="addToCartModal" tabindex="-1" role="dialog" aria-labelledby="addToCartModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addToCartModalLabel">Add to Cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add cart content here -->
                    Service added to the cart!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Go to Cart</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2023 Автоперална Павлинка. Следете не на <a href="#" class="text-warning">Facebook</a> и <a href="#" class="text-warning">Instagram</a>.</p>
    </footer>

    <!-- Lightbox Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>