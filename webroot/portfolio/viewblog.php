<!DOCTYPE html>
<!-- topic 2 excersise -->
<html lang="en">
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="reset.css"/>
		<link rel="stylesheet" type="text/css" href="viewblog.css"/>
		<link rel="stylesheet" type="text/css" href="global.css"/>
        <title>Ben Masters ~ Portfolio</title>
		<link rel="icon" href="https://i.gyazo.com/69f5cd9ae63825e2fe17dbb3671189da.png">
		<script src="scripts.js"></script>
    </head>
	
    <body cz-shortcut-listen="true">
		<div class="nav">
			<header>
				<h1>Ben Masters</h1>
			</header>
		
			<nav>
				<a href="home.html#about">About myself</a>
				<a href="home.html#experience">Experience</a>
				<a href="home.html#education">Education</a>
				<a href="home.html#skills">Skills</a>
				<a href="home.html#portfolio">Portfolio</a>
				<a href="blog.html">Blog</a>
				<a href="login.html">Login</a>
			</nav>
		</div>
        <div class="blogposts">
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

                $sql = "SELECT * FROM BLOGPOSTS";
                $result = $conn->query($sql);
                $row = mysqli_fetch_array($result);

                while($row = mysql_fetch_array($result))
                {
                    echo $row['title']." <br><br>".$row['body'];
                    echo $row['date']." <br><br><br>";
                }
            ?>
        </div>

		<footer>
			<p>Go to <a href="#top">top</a></p>
			<p id="italic">Contact Me: 64bmasters@gmail.com</p>
		</footer>
	</body>
</html>

