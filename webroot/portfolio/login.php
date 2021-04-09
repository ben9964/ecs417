<?php
    

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["email"];
        $password = $_POST["pass"];


        $dbhost = getenv("MYSQL_SERVICE_HOST");
        $dbport = getenv("MYSQL_SERVICE_PORT");
        $dbuser = getenv("DATABASE_USER");
        $dbpwd = getenv("DATABASE_PASSWORD");
        $dbname = getenv("DATABASE_NAME");
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