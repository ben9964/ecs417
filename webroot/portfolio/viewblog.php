<?php
    session_start();
?>

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
				<a href="home.php#about">About myself</a>
				<a href="home.php#experience">Experience</a>
				<a href="home.php#education">Education</a>
				<a href="home.php#skills">Skills</a>
				<a href="home.php#portfolio">Portfolio</a>
                <?php
				if (isset($_SESSION['id'])){
					echo '<a href="blogform.php">Blog</a>';
				}else{
					echo '<a href="viewblog.php">Blog</a>';
				}
                ?>
                <?php
                    if (isset($_SESSION['id'])){
                        echo '<a href="logout.php">Logout</a>';
                    }else{
                        echo '<a href="login.php">Login</a>';
                    }
                ?>
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

                // initialize current timestamp to 0;
                $currentTimestamp = 0;

                // initialize current array that will hold the result
                $resultArr = array();

                // loop through the result 
                // (this example is for PDO, change to whatever driver you use)
                while($row = mysqli_fetch_array($result)) {

                    // save current row in a temp array
                    $currentRow = array($row['date'], $row['title'], $row['body']);

                    // check if you have new timestamp
                    // if yes,initialize second dimension array for that TS
                    // and save the current TS
                    if($row['date'] != $currentTimestamp) {
                        $currentTimestamp = $row['date'];
                        $resultArr[$currentTimestamp] = array();
                    }

                    // add a temp row to the array
                    $resultArr[$currentTimestamp][] = $currentRow;
                }

                foreach($resultArr as $value){
                        echo '<article class="post">
                                <h1>'. $value[1] .'</h1>
                                <p class="body">'. $value[2] .'</p>
                                <p class="date">'. $value[0] .'</p>
                            </article>';
                }
            ?>
        </div>

		<footer>
			<p>Go to <a href="#top">top</a></p>
			<p id="italic">Contact Me: 64bmasters@gmail.com</p>
		</footer>
	</body>
</html>

