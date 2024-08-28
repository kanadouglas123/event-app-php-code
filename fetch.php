<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sqlQuery = "SELECT * FROM event_table";
    $result = $connectNow->query($sqlQuery);

    if ($result->num_rows > 0) {
        $events = [];
        while ($row = $result->fetch_assoc()) {
            $events[] = $row;
        }
        echo json_encode([
            'success' => true,
            'data' => $events
        ]);
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'No events found'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
}
?>
