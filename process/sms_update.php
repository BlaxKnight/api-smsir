<?php
session_start();

require_once 'connect.php';
require_once 'uri.php';

$id = $user = $pass = $line = $mobile = $msg = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $id = $_REQUEST['id'];
  $user = $_REQUEST['username'];
  $pass = $_REQUEST['api-key'];
  $line = $_REQUEST['line'];
  $mobile = $_REQUEST['receiver'];
  $msg = $_REQUEST['message'];
}

$sql = "UPDATE info SET username='" . $user . 
"', apiKey='" . $pass . 
"', line='" . $line . 
"', mobile='" . $mobile . 
"', msg='" . $msg . 
"' WHERE id=" . $id . "";

$conn->query($sql);

$db = null;

header("Location: " . $link . "/api-smsir/dashboard.php");
exit();
