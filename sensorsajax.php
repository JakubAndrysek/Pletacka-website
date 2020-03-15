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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">    


    <style>
        div.my-circle {
            display: inline-block;
            width: 70px;
            height: 70px;
            margin: 6px;
            background-color: red;
            border-radius: 50%!important;
        }        
    </style>







</head>
<body onload="showSensorsTablex(); setInterval(showSensorsTablex, 5000)">

<?php require_once "layout/header.php"; ?>


<div class="container-fluid text-center">
    <h1>Pridani Senzoru</h1>
    <h3>Interval</h3>
    <p id="demo"></p>


    <h3>Autoload</h3>
    <div id="sen"></div>
    <h3>Manualne vyber</h3>

    <button id="show-sensors-table">Zobraz senzory v tabulce</button>
    <button id="show-sensors-list">Zobraz senzory v sennamu</button>
    <div id="sensors"></div>     
        
    </div>

</div>

<script>
    // Create event listener
    document.getElementById('show-sensors-table').addEventListener('click', showSensorsTable);
    document.getElementById('show-sensors-list').addEventListener('click', showSensorsList);
    
    //setInterval(showSensorsTableTimer, 5000);



/*
    function showSensorsTableTimer(){
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'api/v1/sensors.php', true);

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

            document.getElementById('demo').innerHTML = output;
        }
      }

    xhr.send();
    }
    */
    
    function showSensorsTablex(){
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'api/v1/sensors.php', true);

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

            document.getElementById('sen').innerHTML = output;
        }
      }

    xhr.send();
    }


    function showSensorsTable(){
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'api/v1/sensors.php', true);

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

            document.getElementById('sensors').innerHTML = output;
        }
      }

    xhr.send();
    }


    function showSensorsList(){
      var xhr = new XMLHttpRequest();
      xhr.open('GET', 'api/v1/sensors.php', true);

      xhr.onload = function(){
        if(this.status == 200){
            var sensors = JSON.parse(this.responseText);
            
            var output = '';
            
            for(var i in sensors){
                output += '<ul>' +
                '<li>ID: '+ sensors[i].id+'</li>' +
                '<li>Name: '+ sensors[i].name+'</li>' +
                '<li>Name: '+ sensors[i].description +'</li>' +
                '</ul>';
            }

            document.getElementById('sensors').innerHTML = output;
        }
      }

    xhr.send();
    }

  </script>


<?php require_once "layout/afooter.php"; ?>



</body>
</html>

