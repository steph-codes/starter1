<?php
require('user.php');
$Bname = strip_tags(trim($_POST['bizname']));
$email = strip_tags(trim($_POST['email']));
$password = strip_tags(trim($_POST['pwd']));
$location = $_POST['bizstate'];

$sector = isset($_POST['sector'])?
$_POST['sector']:array();

$obj = new user();
$obj->register($Bname,$email,$password,$location,$sector);
$check= $obj->register($Bname,$email,$password,$location,$sector);
if($check){
    $_SESSION['userid'] = $check;
header('location:home.php');
}else{
    header('location:signup.php?msg=try again');
}

?>