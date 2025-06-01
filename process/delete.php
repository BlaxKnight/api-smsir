<?php
require_once 'connect.php';
require_once 'uri.php';

session_start();

$id = $_SESSION['id'];

$sql = "DELETE FROM users WHERE id=" . $id . "";

$conn->query($sql);

$db = null;

$_SESSION = array();
 
session_destroy();

header("Location: " . $link . "/api-smsir/");
exit();
