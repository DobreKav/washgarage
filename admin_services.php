<?php
// admin_services.php

include 'config.php';

// Fetch all services from the database
$sqlServices = "SELECT * FROM services";
$resultServices = $conn->query($sqlServices);

// Fetch all messages from the database
$sqlMessages = "SELECT * FROM messages";
$resultMessages = $conn->query($sqlMessages);

// Check for errors in fetching services
if (!$resultServices || !$resultMessages) {
    die("Error fetching services or messages: " . $conn->error);
}

// Fetch all services into an associative array
$allServices = $resultServices->fetch_all(MYSQLI_ASSOC);

// Fetch all messages into an associative array
$allMessages = $resultMessages->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Автоперална Павлинка</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <!-- Navbar Section -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="admin_services.php">Автоперална Павлинка Админ</a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Одјави се</a>
                    <a class="nav-link" href="create_service_form.php">Креирај услуга</a>
                    
                </li>
            </ul>
        </div>
    </nav>

    <!-- Admin Services Section -->
    <section class="container mt-5">
        <h2 class="text-center mb-4">Управување со услуги</h2>

        

        <!-- Existing Services Table -->
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?php if (isset($allServices) && is_array($allServices) && count($allServices) > 0): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Име</th>
                                <th>Опис на услуга</th>
                                <th>Цена</th>
                                <th>Акција</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allServices as $service): ?>
                                <tr>
                                    <td><?php echo $service["id"]; ?></td>
                                    <td><?php echo $service["name"]; ?></td>
                                    <td><?php echo $service["description"]; ?></td>
                                    <td><?php echo $service["price"]; ?> $</td>
                                    <td>
                                        <div class="col-md-3 d-flex">
                                        
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateServiceModal<?php echo $service["id"]; ?>">
                                            Промени
                                        </button>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteServiceModal<?php echo $service["id"]; ?>">
                                            Избриши
                                        </button>
                                        </div>
                                        
                                    </td>
                                </tr>

                                <!-- Update Service Modal for each service -->
                                <div class="modal fade" id="updateServiceModal<?php echo $service["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="updateServiceModalLabel<?php echo $service["id"]; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateServiceModalLabel<?php echo $service["id"]; ?>">Промени услуга</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Add a form here for updating the service -->
                                                <form method="post" action="update_service.php">
                                                    <input type="hidden" name="service_id" value="<?php echo $service["id"]; ?>">
                                                    <div class="form-group">
                                                        <label for="update_service_name<?php echo $service["id"]; ?>">Име на услуга:</label>
                                                        <input type="text" class="form-control" id="update_service_name<?php echo $service["id"]; ?>" name="update_service_name" value="<?php echo $service["name"]; ?>" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="update_service_description<?php echo $service["id"]; ?>">Опис на услуга:</label>
                                                        <textarea class="form-control" id="update_service_description<?php echo $service["id"]; ?>" name="update_service_description" rows="3" required><?php echo $service["description"]; ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="update_service_price<?php echo $service["id"]; ?>">Цена на услуга:</label>
                                                        <input type="text" class="form-control" id="update_service_price<?php echo $service["id"]; ?>" name="update_service_price" value="<?php echo $service["price"]; ?>" required>
                                                    </div>

                                                    <button type="submit" class="btn btn-primary">Снимај ги промените</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Delete Service Modal for each service -->
                                <div class="modal fade" id="deleteServiceModal<?php echo $service["id"]; ?>" tabindex="-1" role="dialog" aria-labelledby="deleteServiceModalLabel<?php echo $service["id"]; ?>" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteServiceModalLabel<?php echo $service["id"]; ?>">Избриши услуга</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Add a form here for deleting the service -->
                                                <form method="post" action="delete_service.php">
                                                    <input type="hidden" name="service_id" value="<?php echo $service["id"]; ?>">
                                                    <p>Сигурни ли сте дека сакате да избришете услуга"<?php echo $service["name"]; ?>"?</p>
                                                    <button type="submit" class="btn btn-danger">Избриши услуга</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No services found.</p>
                <?php endif; ?>
            </div>
        </div>
        <!-- Appointments Section -->
        <h2 class="text-center mb-4">Резервирај</h2>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?php
                // Fetch and display appointments
                $fetchAppointmentsSql = "SELECT * FROM appointments";
                $appointmentsResult = $conn->query($fetchAppointmentsSql);

                if ($appointmentsResult->num_rows > 0) {
                    echo '<table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Service ID</th>
                                    <th>Име</th>
                                    <th>E-mail</th>
                                    <th>Телефон</th>
                                </tr>
                            </thead>
                            <tbody>';

                    while ($appointment = $appointmentsResult->fetch_assoc()) {
                        echo '<tr>
                                <td>' . $appointment["id"] . '</td>
                                <td>' . $appointment["service_id"] . '</td>
                                <td>' . $appointment["name"] . '</td>
                                <td>' . $appointment["email"] . '</td>
                                <td>' . $appointment["phone"] . '</td>
                            </tr>';
                    }

                    echo '</tbody></table>';
                } else {
                    echo '<p>No appointments found.</p>';
                }
                ?>
            </div>
        </div>
        <!-- Messages Section -->
        <h2 class="text-center mb-4">Пораки</h2>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?php if (isset($allMessages) && is_array($allMessages) && count($allMessages) > 0): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Име</th>
                                <th>Email</th>
                                <th>Порака</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($allMessages as $message): ?>
                                <tr>
                                    <td><?php echo $message["id"]; ?></td>
                                    <td><?php echo $message["name"]; ?></td>
                                    <td><?php echo $message["email"]; ?></td>
                                    <td><?php echo $message["message"]; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>No messages found.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
  

    

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/admin_services.js"></script>
    <script src="js/script.js"></script>
</body>

</html>
