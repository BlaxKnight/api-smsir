<?php
session_start();

$id = $username = '';

$id = $_SESSION["id"];
$username = $_SESSION["username"];

require_once 'connect.php';
require_once 'uri.php';

$user = $pass = $line = $mobile = $msg = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $user = $_REQUEST['username'];
  $pass = $_REQUEST['api-key'];
  $line = $_REQUEST['line'];
  $mobile = $_REQUEST['receiver'];
  $msg = $_REQUEST['message'];
}

$sql = "INSERT INTO info (username, apiKey, line, mobile, msg, userID)
VALUES ('" . $user . "', '" . $pass . "', '" . $line . "', '" . $mobile . "', '" . $msg . "', " . $id . ")";

$conn->query($sql);

$db = null;

header("Location: " . $link . "/api-smsir/dashboard.php");
exit();
