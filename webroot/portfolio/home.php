<?php
    session_start();
	
	
	if (isset($_SESSION['id'])){
		echo "logged in";
	}
?>

<!DOCTYPE html>
<!-- topic 2 excersise -->
<html lang="en">
	<head>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="reset.css"/>
		<link rel="stylesheet" type="text/css" href="homepage.css"/>
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
			<a href="#about">About myself</a>
			<a href="#experience">Experience</a>
			<a href="#education">Education</a>
			<a href="#skills">Skills</a>
			<a href="#portfolio">Portfolio</a>
			<a href="blog.html">Blog</a>
			<?php
				if (isset($_SESSION['id'])){
					echo '<a href="logout.php">Logout</a>';
				}else{
					echo '<a href="login.php">Login</a>';
				}
			?>
		</nav>
	</div>
	
	<article class="welcome">
		<section>
			<h2>This is my portfolio!</h2>
		
		<!-- Socials-->
			<ul class="socials">
				<li><a href="https://twitter.com/Term_Jr"><img src="twitter.png" width="60" height="60"></img><br></a></li>	
				<!--<a href="mailto:s@gmail.com"><img src="mail.png" width="60" height="60"></img></a> -->
			</ul>
		</section>
	</article>
	
	<hr>
	
	<article class="about">		
		<section class="pfp"> <!-- Socials-->
			<figure>
				<img src="pic.png" width="200" height="250"></img>
				<figcaption>
					Software Developer ~<br> 
					Computer science Student @<br>
					Queen Mary University of London
				</figcaption>
			</figure>
		</section>
		
		<section class="aboutText">
			<h2 id="about">About<hr></h2>
			
		
			<p>
			Hi, my name is Ben and I am an aspiring software developer and programmer studying Computer Science. 
			I am a driven gamer that believes that there is a lot of useful methodology applied in the game design and development industry. 
			I have always been driven to examine the inner workings of both software and hardware systems and for many years now I have been 
			a part of various groups and companies where I try to push my own boundaries as well as the boundaries of the field that I am in currently. 
			I have a thirst for knowledge and a large interest in game design and engineering balanced software systems for users to enjoy using rather than 
			something purely functional. My ultimate aspiration right now is to work for a large game company developing software for new content releases 
			that are industry changing.
			</p>
		</section>
	</article>
	
	<hr>
	
	<article class="experience">
		<section><!-- places i've worked-->
			<h2 id="experience">Experience<hr></h2>
			<table>
				<caption>Software Development Experience</caption>
				<thead>
					<tr>
						<th>Game Automation<a href="https://www.minecraftbot.com/"><img src="https://www.minecraftbot.com/img/logo-large.svg" width="25px" height="25px"></a></th>
						<th>Blazing Innovations<a href="https://www.mc-blaze.com/"><img src="https://cdn.minecraft-server-list.com/servericon/426212.png" width="25px" height="25px"></a></th>
					<tr>
				</thead>
				<tbody>
					<tr>
						<td>
						c# Plugin Developer - Maintained, uploaded and fixed bugs in plugins to the main automation software allowing for more feature sets and customisation options
						</td>
						<td>
						Java Plugin Developer - Creating from scratch and updating existing plugins which implement custom features into the game server.
						</td>
					</tr>
				</tbody>
			</table>
		</section>
	</article>
	
	<hr>
	
	<article class="education">
		<section><!-- places i've learned stuff-->
			<h2 id="education">Education<hr></h2>
			<table>
				<thead>
					<th><b>QMUL ~ September 2020 -> Present</b></th>
					<th><b>HeathField Sixth Form College ~ September 2018 -> June 2020</b></th>
				</thead>
				<tbody>
					<td>
						<p>
							<ul>
								<li>Computer science</li>
								<li>Studied so far:</li>
								<ul>
									<li>Procedural Programming</li>
									<li>Object Oriented Programming</li>
									<li>Fundamentals Of Web Technology</li>
								</ul>
							</ul>
						</p>
					</td>
					<td>
						<p>
							<ul>
								<li>- Computer science (A Grade)</li>
								<li>- Maths (B Grade)</li>
								<li>- Psychology (B Grade)</li>
							</ul>
						</p>
					</td>
				</tbody>
			</table>	
		</section>
	</article>
	
	<hr>
	
	<article class="skills">
		<section><!-- languages i've used -->
			<h2 id="skills">Programming Skills<hr></h2>
			<table>
				<thead>
					<tr>
						<th id="gray"></th>
						<th id="head"><img src="java.png" width="35px" height="35px"><br><b>Java</b></th>
						<th id="head"><img src="csharp.png" width="35px" height="35px"><br><b>C#</b></th>
						<th id="head"><img src="cplusplus.svg" width="35px" height="35px"><br><b>C++</b></th>
						<th id="head"><img src="python.png" width="35px" height="35px"><br><b>Python</b></th>
						<th id="head"><img src="js.png" width="35px" height="35px"><br><b>JavaScript</b></th>
					<tr>
				</thead>
				<tbody>
					<tr id="red">
						<th><b>Messed around with it</b></th>
						<td>&#10004;</td>
						<td>&#10004;</td>
						<td>&#10004;</td>
						<td>&#10004;</td>
						<td>&#10004;</td>
					</tr>
					<tr id="orange">
						<th><b>Completed Small Projects</b></th>
						<td>&#10004;</td>
						<td>&#10004;</td>
						<td>&#10004;</td>
						<td>&#10004;</td>
						<td>&#10005;</td>
					</tr>
					<tr id="yellow">
						<th><b>Quite Proficient</b></th>
						<td>&#10004;</td>
						<td>&#10004;</td>
						<td>&#10005;</td>
						<td>&#10004;</td>
						<td>&#10005;</td>
					</tr>
					<tr id="green">
						<th><b>Very Confident</b></th>
						<td>&#10004;</td>
						<td>&#10005;</td>
						<td>&#10005;</td>
						<td>&#10004;</td>
						<td>&#10005;</td>
					</tr>
				</tbody>
			</table>
		</section>
	</article>
	
	<hr>
	
	<article class="projects">
		<section><!-- projects i've worked on-->
			<h2 id="portfolio">Project Portfolio<hr></h2>
			<figure class="startmenu">
				<img src="startcargame.png" height="300" width="750"></img>
				<figcaption>The main menu of the simulation game</figcaption>
			</figure>
			<h3 class="desc">Car Racing Simulator</h3>
			<p class="desc">
				This semester in OOP i have been targeted with making a car racing simulation game. This was a major part of the Object Oriented Programming module
				and I have worked very hard so far trying to achieve my best with this project. I've created imaginitive and true to life car attributes and objects
				which simulate how a car would interact with different surfaces at different speeds simulating crashing, going too fast around corners and other things
				such as going into a pothole on a bumpy road. Players accumulate a score based on how far they get into the simulation and they can also finish a track.
			</p>
			<h3 class="under">Race Menu</h3>
			<p class="left">
				In the race menu as seen below you can click the buttons to Speed Up, Keep Speed, Slow Down or exit the simulation.
				On the left hand side you can see the track that you're currently on as well as your position on the track, indicated
				by the <-- you in the text area. Your current speed, acceeration and tire wear are shown in real time as the race is
				running as well as the name you gave your car at the beginning!
			</p>
			<figure class="racemenu">
				<img src="playcargame.png"></img>
				<figcaption>The racing menu of the simulation game</figcaption>
			</figure>
		</section>
	</article>
	
	<footer>
		<p>Go to <a href="#top">top</a></p>
		<p id="italic">Contact Me: 64bmasters@gmail.com</p>
	</footer>
	
	</body>
</html>