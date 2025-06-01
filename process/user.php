<?php
require_once 'connect.php';
require_once 'uri.php';

$user = $pass = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $user = $_REQUEST['name'];
  $pass = $_REQUEST['pass'];  
}

$sql = "INSERT INTO users (username, password) 
VALUES ('" . $user . "', '" . $pass . "')";

if(empty($user) && empty($pass)){
  header("Location: " . $link . "/api-smsir/register.php");
  exit;
}else{
  if($conn->query($sql) == TRUE){
    header("Location: " . $link . "/api-smsir/login.php");
    exit;
  }else{
    header("Location: " . $link . "/api-smsir/register.php");
    exit;
  }
}

$db = null;