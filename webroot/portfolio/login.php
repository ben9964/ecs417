<?php
    session_start();

    if (isset($_SESSION['id'])){
        header("Location:home.php");
    }
    if ($_SERVER['REQUEST_METHOD'] == 'GET'){
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
    
    
        $sql = "SELECT * FROM USERS WHERE email = '$user' AND password = '$password'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);

        if (is_array($row)){
            $_SESSION["id"] = $row['ID'];
            $_SESSION["email"] = $row['email'];
            echo $user;
        }else {
            echo "invalid login";
        }
        $conn->close();
    }
    
    
?>

<!DOCTYPE html>
<!-- topic 2 excersise -->
<html lang="en">
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="reset.css"/>
		<link rel="stylesheet" type="text/css" href="login.css"/>
		<link rel="stylesheet" type="text/css" href="global.css"/>
        <title>Ben Masters ~ Portfolio</title>
		<link rel="icon" href="https://i.gyazo.com/69f5cd9ae63825e2fe17dbb3671189da.png">
    </head>
	
    <body cz-shortcut-listen="true">
	
	<div class="nav">
		<header>
			<h1>Ben Masters</h1>
		</header>
	
		<nav>
			<a href="home.php#about">About myself</a>
			<a href="home.php#experience">Experience</a>
			<a href="home.php#education">Education</a>
			<a href="home.php#skills">Skills</a>
			<a href="home.php#portfolio">Portfolio</a>
			<a href="blog.html">Blog</a>
			<a href="login.php">Login</a>
		</nav>
	</div>
	<form action="login.php" method="GET" id="login">
			<fieldset>
				<h2>User Login</h2>
				<figure>
					<img src="loginico.jpg" class="login" width="200" height="200">
				</figure>
				
				<article class="credentials">
					<section class="email">
						<label for="email"><b>Email</b></label><br>
						<input type="email" placeholder="Type Your Email" name="email" id="email" required>
					</section>

					<section class="password">
						<label for="pass"><b>Password</b></label><br>
						<input type="password" placeholder="Enter Your Password" name="pass" id="pass" required pattern="(?=.*\d)(?=.*[a-z]).{6,}" title="You must have at least 6 characters and at least 1 number in your password!">
					</section>
				</article>

				<input type="submit" value="Login">
			</fieldset>
	</form>
	<footer>
		<p>Go to <a href="#top">top</a></p>
		<p id="italic">Contact Me: 64bmasters@gmail.com</p>
	</footer>
	
	</body>
</html>