<?php
include 'connect.php';

$userEmail=$_POST['email'];


$sqlQuery="SELECT * FROM users WHERE email='$userEmail'";
$result= $connectNow->query($sqlQuery);

if($result->num_rows>0){
    ////if email exits
    echo json_encode(array('emailFound'=>true));

}else{
    ///if email is not yet registered
    echo json_encode(array('emailFound'=>false));

}