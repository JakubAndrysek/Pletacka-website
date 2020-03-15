<?php
    require_once "php/database_functions.php";
?>

<!DOCTYPE html>
<html lang="cz">
<head>
  
  <title><?php echo getSettings("web_name");?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">


</head>
<body>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <!-- Brand/logo -->
      <a class="navbar-brand" href="index.php">
          <img src="images\Kolo.png" alt="logo" style="width:40px;">
      </a>
      <a class="navbar-brand" href="index.php"><?php echo getSettings("web_name");?></a>
      
      <!-- Links -->
      <ul class="navbar-nav">
          <li class="nav-item">
          <a class="nav-link" href="sensors.php">Sensors</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="sensorsajax.php">Ajax JSON</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="#">Link 3</a>
          </li>
      </ul>
  </nav>
</body>
</html>

