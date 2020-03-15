<?php
    require_once "php/database_functions.php";
?>

<!DOCTYPE html>
<html lang="cz">
<head>
  <title><?php  echo getSettings("web_name");?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <div class="container-fluid text-center p-4 bg-secondary text-white" style="margin-bottom:0">
    <p><?php  echo "© " . date("Y") . " " . getSettings("title_footer");?></p>

    </div>
</body>
</html>

