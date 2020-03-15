<?php
    require "php/database_functions.php";
?>

<!DOCTYPE html>
<html lang="cz">
<head>
    <!-- <meta http-equiv="refresh" content="5" > -->
    <meta http-equiv="refresh" content="500" >
    <title><?php echo getSettings("web_name");?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


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

<?php require_once "layout/header.php"; ?>


<div class="container-fluid text-center">
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

    <div class="container-fluid text-center p-4 ">
        <?php printSensors(); ?>
        
    </div>

</div>



<?php require_once "layout/afooter.php"; ?>



</body>
</html>

