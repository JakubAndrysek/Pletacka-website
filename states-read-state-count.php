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
    <script type="text/javascript" src="js/ajax.js"></script>
</head>
<body>

<?php require_once "layout/header.php"; ?>


<div class="container-fluid text-center">
    <h1>Vypis stavu senzoru</h1>

    <form name="testForm" action="" method="">
      Nazev senzoru: 
      <input type="text" name="sen-name" id="sen-name" onkeyup="showSensorsTableId('search')">
      <input type="text" name="sen-state" id="sen-state" onkeyup="showSensorsTableId('search')">
      <input type="button" value="Hledej" onclick="showSensorsTableId('search')">
    </form>
    <br>
    <div id="search"></div>

    
</div>

<script>
    if(document.getElementById('search').innerHTML != " ")
    {
      setInterval(showSensorsTableId('search'), 5000);
    }   
</script>


<?php require_once "layout/afooter.php"; ?>



</body>
</html>

