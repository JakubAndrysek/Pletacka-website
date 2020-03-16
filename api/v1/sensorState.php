<?php

function getSensorStates($name)
{
    require "../../php/database_connect.php";
    $counter = 0;
    $sql = "SELECT id, state, time FROM $name";
    $result = $mysqli->query($sql);

    $response=array();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) 
        {
            $response[]=$row;
            $counter++;
        }
        $response = array("result"=>$counter) + $response;
    } else {
        $response = array("result"=>"0");

    }
    $output = json_encode($response);
    header('Content-Type: application/json');
    echo $output;
    $result->close();
}

function getSensorByStates($name, $state)
{
    require "../../php/database_connect.php";
    $counter = 0;
    $xstate = "\"" . $state . "\"";
    $sql = "SELECT id, state, time FROM $name WHERE state = $xstate";
    $result = $mysqli->query($sql);

    $response=array();
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) 
        {
            $response[]=$row;
            $counter++;
        }
        $response = array("result"=>$counter) + $response;
    } else {
        $response = array("result"=>"0");

    }
    $output = json_encode($response);
    header('Content-Type: application/json');
    echo $output;
    $result->close();
}



function viewCount($name)
{
    require "../../php/database_connect.php";
    $sql = "SELECT COUNT(*) FROM $name";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();
    $response = array("rows"=>$row[0]);
    $output = json_encode($response);
    header('Content-Type: application/json');
    echo $output;

    $result->close();
}

function viewCountByState($name, $state)
{
    require "../../php/database_connect.php";
    $xstate = "\"" . $state . "\"";
    $sql = "SELECT COUNT(*) FROM $name WHERE state = $xstate";
    $result = $mysqli->query($sql);
    $row = $result->fetch_row();
    $response = array("rows"=>$row[0]);
    $output = json_encode($response);
    header('Content-Type: application/json');
    echo $output;

    $result->close();
}

$request_method=$_SERVER["REQUEST_METHOD"];

switch($request_method)
	{
		case 'GET':
			if(!empty($_GET["name"]))
			{
                $name = $_GET["name"];
                getSensorStates($name);
			}
            break;
        case 'GETE':    //GET + Enum
            if(!empty($_GET["name"]) && (($_GET["state"])==0 || ($_GET["state"])==1))
            {
                $name = $_GET["name"];
                $state = $_GET["state"];
                getSensorByStates($name, $state);
            }
            break;   
        case 'VIEW':    //VIEW + Enum
            if(!empty($_GET["name"]))
            {
                $name = $_GET["name"];
                viewCount($name);
                
            }
            break;                       
        case 'VIEWE':    //VIEW + Enum
            if(!empty($_GET["name"]) && (($_GET["state"])==0 || ($_GET["state"])==1))
            {
                $name = $_GET["name"];
                $state = $_GET["state"];
                viewCountByState($name, $state);
                
            }
            break;             
            
            break; 
        case 'DELETE':
            
            break;                        
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}


?>