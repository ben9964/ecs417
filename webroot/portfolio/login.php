<?php
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

    echo "Error: "

    $user = $_GET["user"];
    $password = $_GET["pass"];
    
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
        $sql = "SELECT * FROM USERS WHERE email = '$user' AND password = '$password'"

        if ($conn->query($sql) === TRUE){

        }else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

?>