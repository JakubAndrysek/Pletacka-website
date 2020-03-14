<?php
    require_once "php/database_functions.php";
?>

<!DOCTYPE html>
<html lang="cz">
<head>
  <title><?php  echo getSettings("web_name");?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>
    <div class="container-fluid text-center p-4 bg-secondary text-white" style="margin-bottom:0">
    <p><?php  echo "© " . date("Y") . " " . getSettings("title_footer");?></p>

    </div>
</body>
</html>

