<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calendar_db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$start_time = $_POST['start_time'];
$end_time = $_POST['end_time'];
$event_type = $_POST['event_type'];

$sql = "INSERT INTO calendar_event_master (name, start_time, end_time, event_type) VALUES ('$name', '$start_time', '$end_time', '$event_type')";

if ($conn->query($sql) === TRUE) {
    echo "New event created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
