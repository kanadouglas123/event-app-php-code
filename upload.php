<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
    $target_dir = "uploads/";

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES['image']['name']);
    
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        $event_title = $_POST['event_title'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $venue = $_POST['venue'];
        $ticket_cost = $_POST['ticket_cost'];
        $description = $_POST['description'];
        $created_by = $_POST['created_by'];
        $image = $target_file;

        $sqlQuery = "INSERT INTO event_table (event_title, date, time, venue, ticket_cost, description, created_by, image) 
                     VALUES ('$event_title', '$date', '$time', '$venue', '$ticket_cost', '$description', '$created_by', '$image')";

        if ($connectNow->query($sqlQuery) === TRUE) {
            echo json_encode([
                'message' => 'Event uploaded successfully',
                'status' => true,
                'event_title' => $event_title,
                'description' => $description
            ]);
        } else {
            echo json_encode(['message' => 'Error: ' . $connectNow->error, 'status' => false]);
        }
    } else {
        echo json_encode(['message' => 'Failed to upload image', 'status' => false]);
    }
} else {
    echo json_encode(['message' => 'No image uploaded', 'status' => false]);
}
?>
