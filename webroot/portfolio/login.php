<?php
    console.log("hi");

    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        $username = $_GET["email"];
        $password = $_GET["pass"];


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

        $sql = "SELECT * FROM USERS WHERE email = '$username' and password = '$password'";  
        
        console.log($conn->query($sql));
    }


?>