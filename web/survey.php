<?php
	if(!isset($_SESSION['loggedin'])){
		header("Location: " . "signin.php", true, 303);
		die();
	}
	
	session_start();
	
	if(isset($_SESSION['taken'])){
		header("Location: /surveyresults.php");
	}
?>
<html lang="en">
	<head>
		<title>Survey Page</title>
		<link rel="stylesheet" href="intro.css"/>
    </head>
    <body>
		<div class="top">
			<ul class="topbar">
				<li class="toplist"><a href="homepage.html">Home Page</a></li>
				<li class="toplist"><a>Games</a></li>
				<li style="float:right" class="toplist"><a>Login</a></li>
            </ul>
		</div>
	
		<div class="left">
			<ul class="leftbar">
				<li class="leftlist"><a href="index.php">Assignments Page</a></li>
				<li class="leftlist"><a href="survey.php" class="active">Week 02</a></li>
				<li class="leftlist"><a href="sales.php">Sales Table</a></li>
				<li class="leftlist"><a>Week 04</a></li>
				<li class="leftlist"><a>Week 05</a></li>
				<li class="leftlist"><a>Week 06</a></li>
				<li class="leftlist"><a>Week 07</a></li>
				<li class="leftlist"><a>Week 08</a></li>
				<li class="leftlist"><a>Week 09</a></li>
				<li class="leftlist"><a>Week 10</a></li>
				<li class="leftlist"><a>Week 11</a></li>
				<li class="leftlist"><a>Week 12</a></li>
				<li class="leftlist"><a>Week 13</a></li>
			</ul>
		</div>
		<div class="main">
		<form action="surveyresults.php" method="POST">
			<h2>Survey</h2>
			<br>
			
			Name: <input type="text" name="name">
			<br><br>
			
			Question 1:
			<br>
			<input type="radio" name="phone" value="Apple">Apple
			<br>
			<input type="radio" name="phone" value="Android">Android
			<br>
			<input type="radio" name="phone" value="Windows">Windows
			<br>
			<input type="radio" name="phone" value="Other">Other
			<br><br>
			
			Question 2: Are you happy with your phone?
			<br>
			<input type="radio" name="happy" value="happy">Yes
			<br>
			<input type="radio" name="happy" value="unhappy">No
			<br>
			<br><br>
			
			Question 3: What type of movies do you like? (check all that apply)
			<br>
			<input type="checkbox" name="movies[]" value="Scary Movies">Scary Movies
			<br>
			<input type="checkbox" name="movies[]" value="Chick Flick">Chick Flick
			<br>
			<input type="checkbox" name="movies[]" value="Suspense">Suspense
			<br>
			<input type="checkbox" name="movies[]" value="Comedy">Comedy
			<br>
			<input type="checkbox" name="movies[]" value="Action">Action
			<br>
			<input type="checkbox" name="movies[]" value="Disney">Disney
			<br><br>
			
			Question 4: Did you enjoy this survey?
			<br>
			<input type="radio" name="enjoy" value="Yes" checked="true">Yes
			<br>
			<br><br>
			
			Add any comments you have about this survey: (50 Characters Maximum)
			<br>
			<textarea name="comment" rows="5" cols="40" maxlength="50" value=""></textarea>
			<br><br>
			
			<input type="submit" name="submit" value="Submit">
			<a href="surveyresults.php">    Go Straight to results</a>
			
			<br><br><br><br><br><br>
		</form>
		</div>
	</body>
</html>