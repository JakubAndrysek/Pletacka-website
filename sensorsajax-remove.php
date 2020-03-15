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

</head>
<body>

<?php require_once "layout/header.php"; ?>


<div class="container-fluid text-center">
    <h1>Odebrani Senzoru</h1>

    <form name="testForm" action="" method="">
      Nazev senzoru: <input type="text" name="id-sen" id="id-sen">
      <input type="button" value="Pridej" onclick="addSensor();">
    </form>
    <br>
    <div id="message"></div>

    
</div>

<script>

    function addSensor(){
      var xhr = new XMLHttpRequest();

      var name = document.getElementById("id-sen").value;
      var post = "{\"sensor_name\" : \"" + name + "\"}";

      var url = "api/v1/sensors.php";
      xhr.open('DELETE', url, true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

      xhr.onload = function(){
        if(this.status == 200){
            var sensor = JSON.parse(this.responseText);
            var addStatus = sensor.status;
            var addMsg = sensor.status_message;
            if(addStatus == 1)
            {
              document.getElementById('message').className = "alert alert-success alert-dismissible";
            }
            else
            {
              document.getElementById('message').className = "alert alert-danger alert-dismissible";
            }
            document.getElementById('message').innerHTML = /*sensor.status + " -> " + */sensor.status_message;
            //document.getElementById('search').innerHTML = "commmand: " + post + "; message: "+this.responseText;
        }
      }
      

      xhr.send(post);
    }

  </script>


<?php require_once "layout/afooter.php"; ?>



</body>
</html>

