<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calendar_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$name = $_POST['name'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$event_type = $_POST['event_type'];

$sql = "UPDATE calendar_event_master SET name = ?, start_time = ?, end_time = ?, event_type = ? WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $name, $start_time, $end_time, $event_type, $id);

if ($stmt->execute()) {
    echo "Event updated successfully.";
} else {
    echo "Error updating event: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
