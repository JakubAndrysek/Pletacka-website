<?php

function getSensors()
{
    require "../../php/database_connect.php";

    $sql = "SELECT id, name, description FROM sensors";
    $result = $mysqli->query($sql);

    $response=array();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) 
        {
            $response[]=$row;
        }
        
		header('Content-Type: application/json');
		echo json_encode($response);
    } else {
        echo "0 results";
    }
    $result->close();
}


function getSensorsID($id=0)
{
    require "../../php/database_connect.php";

    $sql = "SELECT id, name, description FROM sensors WHERE id=$id";
    $result = $mysqli->query($sql);

    $response=array();

    while($row = $result->fetch_assoc()) 
    {
        $response[]=$row;
    }    
    header('Content-Type: application/json');
    echo json_encode($response);

    $result->close();
}

function insertSensor()
{
    $data = json_decode(file_get_contents('php://input'), true);

    require "../../php/database_connect.php";
    require "../../php/database_functions.php";
    $status = 0;
    $error = "";

    if(!sensorIsExist($data["sensor_name"]))
    {
        $sensor_name = $data["sensor_name"];

        $sql = "INSERT INTO sensors (name) VALUES (?)" ;            
        $result = $mysqli->prepare($sql);
        $result->bind_param("s", $sensor_name);
        if($result->execute())
        {
            $status = 1;
        }
        else
        {
            $status = 0;
            $error .= "Sensor is not created in SENSORS";
        }
        $result->close();

        if(!tableIsExist($sensor_name))
        {
            $sql = "CREATE TABLE $sensor_name (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                stav INT(6) NOT NULL DEFAULT '0',
                upleteno INT(6) NOT NULL DEFAULT '0',                
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";
                
            if ($mysqli->query($sql) === TRUE) {
                $status = 1;
            } else {
                $status = 0;
                $error .= "Table is not created";
            }   
        }
        else {
            $status = 0;
            $error .= "Table is already exist";
        }
    }
    else
    {
        $status = 0; 
        $error .= "Sensor is already exist in SENSORS";
    }

    if($status)
    {
        $response=array(
            'status' => 1,
            'status_message' =>'Sensor Added Successfully'
        );
    }
    else if($status == 0)
    {
        $response=array(
            'status' => 0,
            'status_message' =>$error
        );
    }

    header('Content-Type: application/json');
	echo json_encode($response);


}
function deleteSensor()
{
    $data = json_decode(file_get_contents('php://input'), true);
    require "../../php/database_connect.php";
    require "../../php/database_functions.php";
    $status = 0;
    $error = "";

    if(sensorIsExist($data["sensor_name"]))
    {
        $sensor_name = $data["sensor_name"];

        $sql = "DELETE FROM sensors WHERE name = ?" ;            
        $result = $mysqli->prepare($sql);
        $result->bind_param("s", $sensor_name);
        if($result->execute())
        {
            $status = 1;
        }
        else
        {
            $status = 0;
            $error .= "Removing Sensor from SENSORS Failed";
        }
        $result->close();

        if(tableIsExist($sensor_name))
        {
            $sql = "DROP TABLE $sensor_name";
                
            if ($mysqli->query($sql) === TRUE) {
                $status = 1;
            } else {
                $status = 0;
                $error .= "Droping table Failed";
            }   
        }
        else {
            $status = 0;
            $error .= "Table is not exist - Failed";
        }
    }
    else
    {
        $error .= "Sensor is not exist - Failed";
    }

    if($status)
    {
        $response=array(
            'status' => 1,
            'status_message' =>'Sensor Removed Successfully'
        );
    }
    else if($status == 0)
    {
        $response=array(
            'status' => 0,
            'status_message' => $error
        );
    }

    header('Content-Type: application/json');
	echo json_encode($response);


}

$request_method=$_SERVER["REQUEST_METHOD"];

switch($request_method)
	{
		case 'GET':
			// Retrive Products
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
                getSensorsID($_GET["id"]);
			}
			else
			{
                getSensors();
			}
            break;
        case 'POST':
            insertSensor();
            break; 
        case 'DELETE':
            deleteSensor();
            break;                        
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}


?>