<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "pletacka";

    // Create connection
    $mysqli = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


?>