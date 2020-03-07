<?php
    require "php\database_functions.php";
?>

<!DOCTYPE html>
<html lang="cz">
<head>
    <!-- <meta http-equiv="refresh" content="5" > -->
    <meta http-equiv="refresh" content="500" >
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


<div class="container-fluid text-center" </div>
    <h1>Pridani Senzoru</h1>
    
    <?php
                if (isset($zprava))
                        echo('<p>' . $zprava . '</p>');
    ?>

    <form class="form-inline" method="post" action="php/add_sensor.php" >
        <label for="name">Nazev Senzoru</label>
        <input type="" class="form-control" placeholder="Senzor-1" name="sensor-name">

        <button type="submit" class="btn btn-primary" >Přidat</button>        
    </form>

    <div class="container-fluid text-center p-4 " </div>
        <?php printSensors(); ?>
        
    </div>

</div>



<?php require_once "layout\afooter.php"; ?>



</body>
</html>

