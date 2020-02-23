<?php

    function getSettings($parameter)
    {
        require "php\database_connect.php";

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

    function printSensors()
    {
        require "php\database_connect.php";

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
        
    }    

    







?>


<!DOCTYPE html>
<html lang="cz">
<head>


</head>
<body>

<?php
//echo getSettings("web_name");


?>

</body>
</html>
