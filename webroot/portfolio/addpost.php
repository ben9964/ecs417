<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
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

        $date = $_POST["date"];
        $title = $_POST["title"];
        $body = $_POST["blogpost"];
    
        $sql = "INSERT INTO BLOGPOSTS (date, title, body) VALUES ('$date', '$title', '$body')";
        $result = $conn->query($sql);
        if ($result){
            header("Location:viewblog.php");
        }else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
?>