<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['service_id'])) {
    $serviceId = $_POST['service_id'];

    // Delete appointments associated with the service
    $deleteAppointmentsSql = "DELETE FROM appointments WHERE service_id = $serviceId";
    if ($conn->query($deleteAppointmentsSql) === FALSE) {
        echo "Error deleting appointments: " . $conn->error;
    }

    // Delete the service
    $deleteServiceSql = "DELETE FROM services WHERE id = $serviceId";
    if ($conn->query($deleteServiceSql) === TRUE) {
        header("Location: admin_services.php");
        exit();
    } else {
        echo "Error deleting service: " . $conn->error;
    }
}
$conn->close();
?>
