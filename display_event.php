<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "calendar_db";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM calendar_event_master";
$result = $conn->query($sql);

$events = array();

while($row = $result->fetch_assoc()) {
    $event = array(
        'id' => $row['id'],
        'title' => $row['name'],
        'start' => $row['start_time'],
        'end' => $row['end_time'],
        'event_type' => $row['event_type']
    );
    array_push($events, $event);
}

echo json_encode($events);

$conn->close();
?>
