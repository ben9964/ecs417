<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && count($_GET) > 0){
        $_SESSION['month'] = $_GET['month'];
    }
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
        <div class="monthSelect">
            <form method="GET" action="viewblog.php">
                <label>Month Selector</label><br>
                <select name="month">
                    <option>none</option>
                    <option>January</option>
                    <option>February</option>
                    <option>March</option>
                    <option>April</option>
                    <option>May</option>
                    <option>June</option>
                    <option>July</option>
                    <option>August</option>
                    <option>September</option>
                    <option>October</option>
                    <option>November</option>
                    <option>December</option>
                </select>
                <input type="submit" value="Filter" class="button">
            </form>
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

                if (isset($_SESSION['month']) && $_SESSION['month'] != "none"){
                    $month = date("n", strtotime($_SESSION['month']));
                    $sql = "SELECT * FROM BLOGPOSTS WHERE MONTH(date) = $month";
                }else{
                    $sql = "SELECT * FROM BLOGPOSTS";
                }

                
                $result = $conn->query($sql);
                
                $arr = mysqli_fetch_all($result);

                // Array ( [0] => Array ( [0] => 1 
                //                         [1] => 2021-04-13 00:00:00 
                //                         [2] => TEST TITLE 
                //                         [3] => BLOG POST HERE TYPING LOTS OF TYPING ) 
                //         [1] => Array ( [0] => 2 
                //                         [1] => 2021-04-22 00:00:00 
                //                         [2] => BLOGGG 
                //                         [3] => SECOND POST OF THE DAY WHATS UP GAMERS ) 
                //         [2] => Array ( [0] => 3 
                //                         [1] => 2021-03-30 00:00:00 
                //                         [2] => THIRD POST 
                //                         [3] => TESTING TESTING GAMERS ) 
                //         [3] => Array ( [0] => 4 
                //                         [1] => 2021-04-28 00:00:00 
                //                         [2] => FOURTH POST 
                //                         [3] => fourth post here hey whats up ) 
                //         [4] => Array ( [0] => 5 
                //                         [1] => 2021-04-10 15:44:59 
                //                         [2] => FINAL POST!?! 
                //                         [3] => IM QUITTING ITS APRIL FOOLS JOKes ) 
                //     )

                if (!empty($arr)){
                    function date_compare($element1, $element2) {
                        $datetime1 = strtotime($element1[1]);
                        $datetime2 = strtotime($element2[1]);
                        return $datetime1 - $datetime2;
                    } 
                      
                    usort($arr, 'date_compare');
    
                    foreach ($arr as $key => $value){
                        echo '<article class="post">
                                <h1>'. $arr[$key][2] .'</h1>
                                <p class="body">'. $arr[$key][3] .'</p>
                                <p class="date">'. $arr[$key][1] .'</p>
                              </article>';
                    }
                }else{
                    echo '<article class="post">
                                <h1> No Blog Posts Found!</h1>
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

