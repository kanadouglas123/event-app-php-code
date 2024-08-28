<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $sqlQuery = "SELECT * FROM comments";
    $result = $connectNow->query($sqlQuery);

    if ($result->num_rows > 0) {
        $comment = [];
        while ($row = $result->fetch_assoc()) {
            $comment[] = $row;
        }
        echo json_encode([
            'success' => true,
            'data' => $comment
        ]);
    } else {
        echo json_encode([
            'status' => false,
            'message' => 'No comment found'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
}
?>
