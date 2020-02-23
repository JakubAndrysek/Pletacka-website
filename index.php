<?php 
    require_once "php\database_functions.php";
?>

<!DOCTYPE html>
<html lang="cz">
<head>
    <!-- <meta http-equiv="refresh" content="5" > -->
    <title><?php  echo getSettings("web_name");?></title>
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

<?php  require_once "layout\header.php"; ?>



<div class="container-fluid text-center p-4 bg-primary text-white" </div>
    <h1 class="display-4">
        <?php  echo getSettings("work_shift_A");?>
    </h2>
    <div class="row">
        <div class="col-sm-4 ">
            <?php  echo getSettings("title_pair_count");?>
        </div>
        <div class="col-sm-4">
        <?php  echo getSettings("title_succes_rate");?>    
        </div>
        <div class="col-sm-4">
            <?php  echo getSettings("title_error_count");?>
        </div>                
    </div>    
</div>

<div class="container-fluid text-center p-4 bg-info text-white" </div>

    
   
    
    <h1 class="display-4">
        Info
    </h2>
    <div class="row">
        <div class="col-sm-3 ">
            <table class="table table-borderless"> 
                <tr>
                    <td><div class = "circle-text"><h2>1</h2></div></td>
                    <td><div class="my-circle">10 m</div></td>
                </tr>    
            </table> 

        
        </div>
        <div class="col-sm-3">
        <?php  echo getSettings("title_succes_rate");?>    
        </div>
        <div class="col-sm-3">
            <?php  echo getSettings("title_error_count");?>
        </div>     
        <div class="col-sm-3">
            <?php  echo getSettings("title_error_count");?>
        </div>                     
    </div>    
</div>



<div class="container-fluid text-center p-4 " </div>
    <?php  printSensors(); ?>
    
</div>







<?php  require_once "layout\afooter.php"; ?>



</body>
</html>

