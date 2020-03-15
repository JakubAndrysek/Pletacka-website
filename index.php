<?php 
    require_once "php/database_functions.php";
?>

<!DOCTYPE html>
<html lang="cz">
<meta charset="utf-8">
<head>
    <!-- <meta http-equiv="refresh" content="5" > -->
    <title><?php  //echo getSettings("web_name");?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php  require_once "layout/header.php"; ?>



<div class="container-fluid x p-4 bg-primary text-white" >
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

<div class="container-fluid text-center p-4 bg-info text-white" >

    
   
    
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







<?php  require_once "layout/afooter.php"; ?>



</body>
</html>

