<?php
require_once 'process/uri.php';

session_start();
 
$_SESSION = array();
 
session_destroy();
 
header("location: " . $link . "/api-smsir/");
exit;