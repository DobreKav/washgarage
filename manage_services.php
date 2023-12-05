<!-- manage_services.php -->
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<div class="row">
    <div class="col-md-6">
        <h3>Измени услуга</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="update_service_id">Број на услуга:</label>
                <input type="text" class="form-control" id="update_service_id" name="update_service_id" required>
            </div>
            <div class="form-group">
                <label for="update_service_name">Име на услуга:</label>
                <input type="text" class="form-control" id="update_service_name" name="update_service_name" required>
            </div>
            <div class="form-group">
                <label for="update_service_price">Нова цена на услуга:</label>
                <input type="text" class="form-control" id="update_service_price" name="update_service_price" required>
            </div>
            <button type="submit" class="btn btn-primary" name="update_service">Промени услуга</button>
        </form>
    </div>

    <div class="col-md-6">
        <h3>Додади нова услуга</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="new_service_name">Service Name:</label>
                <input type="text" class="form-control" id="new_service_name" name="new_service_name" required>
            </div>
            <div class="form-group">
                <label for="new_service_description">Service Description:</label>
                <textarea class="form-control" id="new_service_description" name="new_service_description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="new_service_price">Service Price:</label>
                <input type="text" class="form-control" id="new_service_price" name="new_service_price" required>
            </div>
            <button type="submit" class="btn btn-success" name="add_service">Add Service</button>
        </form>
    </div>
</div>

<?php
// Handle service updates
if (isset($_POST['update_service'])) {
    $updateServiceId = $_POST['update_service_id'];
    $updateServiceName = $_POST['update_service_name'];
    $updateServicePrice = $_POST['update_service_price'];

    // Add your logic to update the service in the database
    // Example: $result = updateService($updateServiceId, $updateServiceName, $updateServicePrice);
}

// Handle service additions
if (isset($_POST['add_service'])) {
    $newServiceName = $_POST['new_service_name'];
    $newServiceDescription = $_POST['new_service_description'];
    $newServicePrice = $_POST['new_service_price'];

    // Add your logic to add the new service to the database
    // Example: $result = addService($newServiceName, $newServiceDescription, $newServicePrice);
}
?>
