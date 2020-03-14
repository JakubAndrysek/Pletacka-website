<?php
    //  Get settings from database table "setings"
    function getSettings($parameter)
    {
        require "database_connect.php";

        $sql = "SELECT  $parameter  FROM settings";
        
        $result = $mysqli->prepare($sql);
        //$result->bind_param("s", $_GET['q']);
        $result->execute();
        $result->store_result();
        $result->bind_result($output);
        $result->fetch();
        $result->close();
        return $output;
    }

    //Print table with all sensors
    function printSensors()
    {
        require "database_connect.php";

        $sql = "SELECT id, name, description FROM sensors";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class=\"table table-striped\"><tr><th>ID</th><th>Name</th><th>Description</th></tr>";
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["description"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $result->close();
        
    }   

    //Get count of rows in the table
    function getCount($table)
    {
        require "database_connect.php";

        $sql = "SELECT COUNT(*) FROM $table ";
        
        $result = $mysqli->prepare($sql);
        $result->execute();
        $result->store_result();
        $result->bind_result($output);
        $result->fetch();
        $result->close();
        return $output;
    }    

    //Get count of rows with same values
    function getCountByName($table, $columnName, $value)
    {
        require "database_connect.php";

        $sql = "SELECT COUNT(*) FROM $table WHERE $columnName = ?";
        
        $result = $mysqli->prepare($sql);
        $result->bind_param("s", $value);
        $result->execute();
        $result->store_result();
        $result->bind_result($output);
        $result->fetch();
        $result->close();
        return $output;
    }
    
    //Return 1 ii sensor exist
    function sensorIsExist($name)
    {
        if (getCountByName("sensors", "name", $name)>0)
        {
            return 1;
        }
        else 
        {
            return 0;
        }
    }
    
    //Return 1 if table exist
    function tableIsExist($from)
    {
        require "database_connect.php";

        $sql = "SELECT COUNT(*) FROM $from";

        if ($mysqli->query($sql) === FALSE) {
            $error = $mysqli->error;
            if(strstr($error, "doesn't exist"))
            {
                //echo "No exist";
                $output = 0;
            }
            else
            {
                echo "Error: " . $error . "<br>";
            }
        }
        else
        {
            //echo "Exist";
            $output = 1;
        }

        return $output;
        
    }      

?>


