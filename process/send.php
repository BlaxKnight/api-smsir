<?php
require_once 'connect.php';
require_once 'uri.php';

$id = $_GET['id'];
$username = $_GET['username'];
$password = $_GET['password'];

$dbusername = $dbpassword = "";

$sql_check = "SELECT * FROM users 
WHERE username='" . $username . "' AND password='" . $password . "'";
$statement = $conn->prepare($sql_check);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_OBJ);
$status = $statement->fetchAll();

if($status){
  foreach($status as $data){
    $dbusername = $data->username;
    $dbpassword = $data->password;
  }
}

$user = $pass = $line = $mobile = $msg = '';

$sql = "SELECT * FROM info WHERE id=" . $id . "";
$statement = $conn->prepare($sql);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_OBJ);
$result = $statement->fetchAll();

if($result){
  foreach($result as $data){
    $user = $data->username;
    $pass = $data->apiKey;
    $line = $data->line;
    $mobile = $data->mobile;
    $msg = $data->msg;
  }
}

$db = null;

if($dbusername == $username && $dbpassword == $password){
  $msg = str_replace(" ", "%20", $msg);

  $url = "https://api.sms.ir/v1/send?username=" . $user . 
  "&password=" . $pass . 
  "&line=" . $line . 
  "&mobile=" . $mobile . 
  "&text=" . $msg;
  echo $url;
  $response = file_get_contents($url);
}else{
  echo "Invalid User Request";
}

header("Location: " . $link . "/api-smsir/dashboard.php");
exit();
