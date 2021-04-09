<?php

    $dbhost = "127.0.0.1"
    $dbport = "3306"
    $dbuser = "root"
    $dbpwd = ""
    $dbname = "ecs417"
    // Creates connection
    $conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
    // Checks connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){
        $sql = "INSERT INTO USERS (email, password) VALUES ('terminated994@gmail.com', 'password1234')";
        if ($conn->query($sql) === TRUE) {
            //Your code
        
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
?>