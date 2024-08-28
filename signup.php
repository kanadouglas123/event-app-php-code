<?php
include 'connect.php';

$userName=$_POST['username'];
$userEmail=$_POST['email'];
$userPassword=md5($_POST['password']);

$sqlQuery="INSERT INTO users SET username='$userName',email='$userEmail', password='$userPassword'";
$result= $connectNow->query($sqlQuery);

if($result){
    echo json_encode(array('success'=>true));

}else{
    echo json_encode(array('success'=>false));

}

?>