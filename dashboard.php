<?php
require_once 'process/connect.php';
require_once 'process/uri.php';

session_start();
$id = $_SESSION["id"];
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("Location: " . $link . "/api-smsir/dashboard.php");
  exit;
}

$username = $_SESSION['username'];

$sql_check = "SELECT * FROM users WHERE username='" . $username . "'";
$statement = $conn->prepare($sql_check);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_OBJ);
$status = $statement->fetchAll();

$password = "";

if ($status) {
  foreach ($status as $data) {
    $password = $data->password;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SMS Panel</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>

<body>
  <main style="height: auto; align-items: start;">
    <div class="dashboard">
      <nav class="dashboard-nav">
        <a href="create.php"><button class="dashboard-nav-btn">Create a Record</button></a><br>
        <a href="settings.php"><button class="dashboard-nav-btn">Settings</button></a><br>
        <a href="logout.php"><button class="dashboard-nav-btn">Logout</button></a><br>
      </nav>
      <div class="dashboard-table-wrapper">
        <table class="dashboard-table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">ID</th>
              <th scope="col">Username</th>
              <th scope="col">Line</th>
              <th scope="col">Receiver</th>
              <th scope="col">API Key</th>
              <th scope="col">Message</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $user = $pass = $line = $mobile = $msg = '';

            $sql = "SELECT * FROM info WHERE userID=" . $id . "";
            $statement = $conn->prepare($sql);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_OBJ);
            $result = $statement->fetchAll();

            $i = 0;

            if ($result) {
              foreach ($result as $data) {
                $q = ++$i;
                $id = $data->id;
                $user = $data->username;
                $pass = $data->apiKey;
                $line = $data->line;
                $mobile = $data->mobile;
                $msg = $data->msg;
                $newMsg = mb_strimwidth($msg, 0, 20, "...");
                echo "<tr><th scope='row'>" . $q . "</th><td>" . $id . "</td><td>" . $user . "</td><td>" . $line . "</td><td>" . $mobile . "</td><td>" . $pass . "</td><td>" . $newMsg . '</td><td><a href="process/send.php?id=' . $id . '&username=' . $username . '&password=' . $password . '"><button class="dashboard-table-action dashboard-table-action-send"><i class="bi bi-send-fill"></i></button></a> <a href="update.php?id=' . $id . '"><button class="dashboard-table-action dashboard-table-action-edit"><i class="bi bi-pencil-square"></i></button></a> <a href="process/sms_delete.php?id=' . $id . '"><button class="dashboard-table-action dashboard-table-action-delete"><i class="bi bi-trash3-fill"></i></button></a></td></tr>';
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</body>

</html>