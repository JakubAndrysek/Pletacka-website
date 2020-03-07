<?php
    require "database_functions.php";
    

    if ($_POST)
    {
        require "database_connect.php";
        $msg = "";

        if(!sensorIsExist($_POST['sensor-name']))
        {
            $sensor_name = $_POST['sensor-name'];

            $sql = "INSERT INTO sensors (name) VALUES (?)" ;            
            $result = $mysqli->prepare($sql);
            $result->bind_param("s", $sensor_name);
            $result->execute();
            $result->close();
            $msg .= "Add $sensor_name create successfully in Sensors";

            if(!tableIsExist($sensor_name))
            {
                $sql = "CREATE TABLE $sensor_name (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    stav INT(6) NOT NULL DEFAULT '0',
                    upleteno INT(6) NOT NULL DEFAULT '0',                
                    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                    )";
                    
                if ($mysqli->query($sql) === TRUE) {
                    $msg .= "Table $sensor_name created successfully";
                } else {
                    $msg .= "Error creating table: " . $mysqli->error;
                }   

            }
            else {
                $msg .=  "Table is exist";
            }



        }
        else
        {
            $msg .= "Sensor is exist";
        }

        //Redirect to sensors
        $_POST['msg'] = $msg;
        header('Location: sensors.php');
        exit;
    }



?>


<!DOCTYPE html>
<html lang="cz">
<head>


</head>
<body>

<?php

echo $msg;

?>

</body>
</html>
