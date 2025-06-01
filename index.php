<?php session_start(); ?>
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
  <main>
    <h1>SMS Manager</h1>
    <div class="btn-group">
      <?php if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) { ?>
        <a href="register.php"><button class="btn-group-item" id="btn-group-item-register">Register</button></a>
        <a href="login.php"><button class="btn-group-item" id="btn-group-item-login">Login</button></a>
      <?php } else { ?>
        <a href="logout.php"><button class="btn-group-item" id="btn-group-item-logout">Logout</button></a>
        <a href="dashboard.php"><button class="btn-group-item" id="btn-group-item-dashboard">Dashboard</button></a>
      <?php } ?>
    </div>
  </main>

</body>

</html>