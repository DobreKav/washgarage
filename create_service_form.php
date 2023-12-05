<!-- create_service_form.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Креирај услуга - Автоперална Павлинка</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Create Service</h2>
        <form action="create_service.php" method="post">
            <div class="form-group">
                <label for="service_name">Име на услуга:</label>
                <input type="text" name="service_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="service_description">Опис на услуга:</label>
                <textarea name="service_description" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="service_price">Цена на услуга:</label>
                <input type="number" name="service_price" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Креирај услуга</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
