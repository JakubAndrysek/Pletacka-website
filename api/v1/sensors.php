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

$request_method=$_SERVER["REQUEST_METHOD"];

switch($request_method)
	{
		case 'GET':
			// Retrive Products
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
                //get_employees($id);
                //echo $_GET["id"];
                getSensorsID($_GET["id"]);
			}
			else
			{
                getSensors();
			}
			break;
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}


?>