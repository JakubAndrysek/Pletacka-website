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
<body onload="showSensorsTable()">

<?php require_once "layout/header.php"; ?>


<div class="container-fluid text-center">
    <h1>Vyhledavani Senzoru</h1>

    <form name="testForm" action="" method="">
      ID senzoru: <input type="text" name="id-sen" id="id-sen">
      <input type="button" value="Hledej" onclick="showSensorsTable();">
    </form>
    <br>
    <div id="search"></div>

    
</div>

<script>

    function showSensorsTable(){
      var xhr = new XMLHttpRequest();

      var name = document.getElementById("id-sen").value;

      var url = "api/v1/sensors.php" + "?id=" + name;
      xhr.open('GET', url, true);

      xhr.onload = function(){
        if(this.status == 200){
            var sensors = JSON.parse(this.responseText);
          
            var output = '';        
            var output = "<table class=\"table table-striped\"><tr><th>ID</th><th>Name</th><th>Description</th></tr>";
            for(var i in sensors)
            {
                output += 
                "<tr><td>" + sensors[i].id + "</td><td>" + sensors[i].name + "</td><td>" + sensors[i].description + "</td></tr>";
            }
            output += "</table>";

            document.getElementById('search').innerHTML = output;
        }
      }

    xhr.send();
    }

  </script>


<?php require_once "layout/afooter.php"; ?>



</body>
</html>

