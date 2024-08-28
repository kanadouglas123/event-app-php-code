<?php
include 'connect.php';

$comment = $_POST['comment'];
$user_id = $_POST['user_id'];
$event_id = $_POST['event_id'];

$sqlQuery = "INSERT INTO comments (comment, user_id, event_id) VALUES ('$comment', '$user_id', '$event_id')";
$result = $connectNow->query($sqlQuery);

if ($result) {
    echo json_encode(array('success' => true));
} else {
    echo json_encode(array('success' => false, 'error' => $connectNow->error));
}
?>
