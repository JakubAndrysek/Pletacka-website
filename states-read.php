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
    <h1>Vypis stavu senzoru</h1>

    <form name="testForm" action="" method="">
      Nazev senzoru: <input type="text" name="id-sen" id="id-sen" onkeyup="showSensorsTable()">
      <input type="button" value="Hledej" onclick="showSensorsTable();">
    </form>
    <br>
    <div id="search"></div>

    
</div>

<script>

    function showSensorsTable(){
      var xhr = new XMLHttpRequest();

      var name = document.getElementById("id-sen").value;

      var url = "api/v1/sensorState.php" + "?name=" + name;
      xhr.open('GET', url, true);

      xhr.onload = function(){
        if(this.status == 200){
            var sensors = JSON.parse(this.responseText);
            if(sensors.result > 0)
            {
              document.getElementById('search').className = "";
              var output = '';        
              var output = "<table class=\"table table-striped\"><tr><th>ID</th><th>State</th><th>Time</th></tr>";
              for(var i in sensors)
              {
                  if(i != "result"){output += "<tr><td>" + sensors[i].id + "</td><td>" + sensors[i].state + "</td><td>" + sensors[i].time + "</td></tr>";}
              }
              output += "</table>";
            }
            else
            {
              document.getElementById('search').className = "alert alert-danger alert-dismissible";
              output = "There is not any state";
            }
            document.getElementById('search').innerHTML = output;
            
        }
      }

    xhr.send();
    }

    if(document.getElementById('search').innerHTML != " ")
    {
      setInterval(showSensorsTable, 5000);
    }

  </script>


<?php require_once "layout/afooter.php"; ?>



</body>
</html>

