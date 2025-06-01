<?php
require_once 'connect.php';
require_once 'uri.php';

$id = $_GET['id'];

$sql = "DELETE FROM info WHERE id=" . $id . "";

$conn->query($sql);

$db = null;

header("Location: " . $link . "/api-smsir/dashboard.php");
exit();
