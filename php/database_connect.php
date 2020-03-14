<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "lopaticka";
    $dbname = "pletacka";


    $mysqli = new mysqli($servername, $username, $password, $dbname);
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }




?>