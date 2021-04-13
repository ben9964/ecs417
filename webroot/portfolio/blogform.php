<!DOCTYPE html>
<?php
	session_start();

	if (!isset($_SESSION['id'])){
		header("Location:login.php");
	}
?>

<!-- topic 2 excersise -->
<html lang="en">
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="reset.css"/>
		<link rel="stylesheet" type="text/css" href="blog.css"/>
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
				<a href="viewblog.php">View Blog</a>
				<?php
					if (isset($_SESSION['id'])){
						echo '<a href="logout.php">Logout</a>';
					}else{
						echo '<a href="login.php">Login</a>';
					}
				?>
			</nav>
		</div>
		<form name="blog" method="POST" action="addpost.php" onsubmit="return preventDefault()">
			<fieldset>
				<legend>New Blog Post</legend>
				<article>
					<p>
						<label>First Name</label> <br>
						<input type="text" name="fname" placeholder="Your first name" required>
					</p>
					<p>
						<label>Last Name</label> <br>
						<input type="text" name="lname" placeholder="Your last name" required>
					</p>
					<p>
						<label>Email Address</label> <br>
						<input type="email" name="email" placeholder="Your email address">
					</p>
					<p>
						<label>Telephone Number</label> <br>
						<input type="tel" name="tel" pattern="[0-9]{2}-[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Your Phone No.">Example: 44-207-882-1234
					</p>
				</article>
				<article>
					<p>
						<label>Blog Post Title</label> <br>
						<input type="text" name="title" placeholder="Subject" id="title">
					</p>
					<p>
						<label>Post Content</label> <br>
						<textarea type="text" name="blogpost" placeholder="Your blog post here" rows="10" cols="200" id="post"></textarea>
					</p>
					<p>
						<label>Date</label> <br>
						<input name="date" type="date" required>
					</p>
				</article>
				<article class="white">
					<p>
						<label>Please Keep me informed about blog posts</label>
						<input type="checkbox" name="accept"> <br>
						<br>
						<section>
							<input type="submit" value="Submit" class="button" id="submitButton">
							<input type="reset" value="Clear Form" class="button" onClick="areYouSure()">
						</section>
					</p>
				</article>
			</fieldset>
		</form>
		<footer>
			<p>Go to <a href="#top">top</a></p>
			<p id="italic">Contact Me: 64bmasters@gmail.com</p>
		</footer>
	</body>
</html>

