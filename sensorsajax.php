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
    <button id="button">Get Text File</button>
    <div id="text"></div>
    <div id="tab"></div>
    <div class="container-fluid text-center p-4 " id="table" </div>
        
        
    </div>

</div>

<script>
    // Create event listener
    document.getElementById('button').addEventListener('click', loadText);

    function loadText(){
      // Create XHR Object
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'http://localhost/pletacka-website/api/v1/sensors.php', true);

        console.log('READYSTATE: ', xhr.readyState);

        xhr.onload = function(){
            if(this.readyState == 4 && this.status == 200)
            {
                document.getElementById('text').innerHTML = this.responseText;
                var sensors = JSON.parse(this.responseText);

                var output = "<table class=\"table table-striped\"><tr><th>ID</th><th>Name</th><th>Description</th></tr>";

                for(var i in sensors)
                {
                    output += 
                    "<tr><td>" + sensors[i].id + "</td><td>" + sensors[i].name + "</td><td>" + sensors[i].description + "</td></tr>";
                }
                
                output += "</table>";

                document.getElementById("tab").innerHTML = output;
            }
        }


        xhr.onerror = function(){
            console.log('Request Error...');
        }


        xhr.send();
    }

  </script>


<?php require_once "layout\afooter.php"; ?>



</body>
</html>

