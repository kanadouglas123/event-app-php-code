<?php
include 'connect.php';

$userEmail=$_POST['email'];
$userPassword=md5($_POST['password']);


$sqlQuery="SELECT * FROM users WHERE email='$userEmail'AND password='$userPassword'";
$result= $connectNow->query($sqlQuery);

if($result->num_rows>0){
    $userRecord=array();

    while($rowFound=$result->fetch_assoc()){
        $userRecord[]=$rowFound;
    }
    ////if email exits
    echo json_encode(array(
        'emailFound'=>true,
        'userData'=>$userRecord

    ));

}else{
    echo json_encode(array("emailFound"=>false));

}