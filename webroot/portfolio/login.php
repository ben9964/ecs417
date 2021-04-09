

<?php
    session_start();

    if (isset($_SESSION['user'])){
        header("Location:home.html");
    }

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

    $user = $_GET["email"];
    $password = $_GET["pass"];
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $sql = "SELECT * FROM USERS WHERE email = '$user' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0){
            $_SESSION['user'] = $user;
            header("Location:home.html");
        }else {
            echo "Invalid username or password" . $user . $password;
        }
        $conn->close();
    }
    
    
?>