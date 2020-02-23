<?php
    require "php\database_functions.php";
?>

<!DOCTYPE html>
<html lang="cz">
<head>
    <!-- <meta http-equiv="refresh" content="5" > -->
    <title><?php echo getSettings("web_name");?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <style>
        div.my-circle {
            display: inline-block;
            width: 70px;
            height: 70px;
            margin: 6px;
            background-color: red;
            border-radius: 50%!important;
        }

        circle-text {
            
        }

        
    </style>
</head>
<body>

<?php require_once "layout\header.php"; ?>



<div class="container-fluid text-center p-4 " </div>
    <?php printSensors(); ?>
    
</div>



<?php require_once "layout\afooter.php"; ?>



</body>
</html>

