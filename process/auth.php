<?php
require_once 'connect.php';
require_once 'uri.php';

$user = $pass = '';
$id = $dbuser = $dbpass = '';

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $user = $_REQUEST['name'];
  $pass = $_REQUEST['pass'];  
}

$sql = "SELECT * FROM users 
WHERE username='" . $user . "' AND password='" . $pass . "'";
$statement = $conn->prepare($sql);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_OBJ);
$result = $statement->fetchAll();

if($result){
  foreach($result as $data){
    $id = $data->id;
    $dbuser = $data->username;
    $dbpass = $data->password;
  }
}

if($dbuser == $user && $dbpass == $pass){
  if(empty($user) || empty($pass)){
    header("Location: " . $link . "/api-smsir/login.php");
    exit();
  }else{
    if($conn->query($sql) == TRUE){
      echo "Login Complete.";
      session_start();
      $_SESSION["loggedin"] = true;
      $_SESSION["id"] = $id;
      $_SESSION["username"] = $user;
      header("Location: " . $link . "/api-smsir/dashboard.php");
      exit();
    }else{
      header("Location: " . $link . "/api-smsir/login.php");
      exit();
    }
  }
}else{
  header("Location: " . $link . "/api-smsir/login.php");
  exit();
}

$db = null;