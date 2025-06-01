<?php
require_once 'process/uri.php';
session_start();

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("Location: " . $link . "/api-smsir/dashboard.php");
  exit;
}
?>
<!DOCTYPE html>
<html>

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
    <div class="form-wrapper">
      <form class="form" action="process/user.php" method="post">
        <fieldset class="fieldset">
          <a href="index.php"><div class="close-btn close-btn-floating">
            <i class="bi bi-box-arrow-left close-icon"></i>
          </div></a>
          <legend class="fieldset-legend">
            <h2 class="legend-title">Register Form</h2>
          </legend>
          <div class="input-group">
            <label class="input-group-label" for="name">Username</label>
            <input
              class="input-group-el"
              type="text"
              name="name"
              id="name"
              autocomplete="off" />
          </div>
          <div class="input-group">
            <label class="input-group-label" for="pass">Password</label>
            <input
              class="input-group-el"
              type="password"
              name="pass"
              id="pass"
              autocomplete="off" />
          </div>
          <div class="form-actions-wrapper">
            <input
              class="form-action form-submit"
              type="submit"
              name="register"
              value="Register" />
            <input class="form-action form-reset" type="reset" value="Reset" />
          </div>
        </fieldset>
      </form>
    </div>

  </main>
</body>

</html>