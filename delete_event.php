<?php

$connect = new mysqli('localhost', 'root', '', 'calendar_db');

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
   
    $query = "DELETE FROM calendar_event_master WHERE id = ?";
    $stmt = $connect->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Event deleted successfully!";
    } else {
        echo "Error deleting event: " . $connect->error;
    }

    $stmt->close();
}

$connect->close();
?>
