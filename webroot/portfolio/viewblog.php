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
                
                $arr = array();

                while ($row = mysqli_fetch_array($result)){
                    array_push($arr, $row);
                }

                function date_compare($element1, $element2) {
                    $datetime1 = strtotime($element1['date']);
                    $datetime2 = strtotime($element2['date']);
                    return $datetime1 - $datetime2;
                } 
                  
                // Sort the array 
                usort($arr, 'date_compare');

                echo $arr;

                // foreach ($arr as $key => $value){
                //     echo '<article class="post">
                //             <h1>'. $arr['title'] .'</h1>
                //             <p class="body">'. $arr['body'] .'</p>
                //             <p class="date">'. $arr['date'] .'</p>
                //           </article>';
                // }

                // while($row = mysqli_fetch_array($result))
                // {
                //     echo '<article class="post">
                //             <h1>'. $row['title'] .'</h1>
                //             <p class="body">'. $row['body'] .'</p>
                //             <p class="date">'. $row['date'] .'</p>
                //           </article>';
                // }
            ?>
        </div>

		<footer>
			<p>Go to <a href="#top">top</a></p>
			<p id="italic">Contact Me: 64bmasters@gmail.com</p>
		</footer>
	</body>
</html>

