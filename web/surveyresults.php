<html lang="en">
	<head>
		<title>Results</title>
		<link rel="stylesheet" href="intro.css"/>
    </head>
    <body>
		<div class="top">
			<ul class="topbar">
				<li class="toplist"><a href="homepage.php">Home Page</a></li>
				<li class="toplist"><a>Games</a></li>
				<li style="float:right" class="toplist"><a href="signin.php">Login</a></li>
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
		<pre>
		<?php
		//printing out results for use
			//print_r($_POST);
			
			//Survey questions: 
			if(!isset($_SESSION['taken'])){
				$_SESSION['taken'] = 0;
			}
			
			//set default values
			if (isset($_POST['submit'])) {
				$name = isset($_POST['name']) ? $_POST['name'] : "";
				$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
				$happy = isset($_POST['happy']) ? $_POST['happy'] : "";
				$movies = isset($_POST['movies']) ? $_POST['movies'] : "";
				$enjoy = isset($_POST['enjoy']) ? $_POST['enjoy'] : "";
				$comment = isset($_POST['comment']) ? $_POST['comment'] : "";
			} else {
				//otherwise set to empty.
				$name = "";
				$phone = "";
				$happy = "";
				$movies = "";
				$enjoy = "";
				$comment = "";
			}
			
			if ($_SESSION['taken'] == 0 && (!isset($_SESSION['name']))){
				$_SESSION['name'] = $name;
				$_SESSION['phone'] = $phone;
				$_SESSION['happy'] = $happy;
				$_SESSION['movies'] = $movies;
				$_SESSION['enjoy'] = $enjoy;
				$_SESSION['comment'] = $comment;
				$_SESSION['taken'] = 1;
			}
			
			if (!isset($_SESSION['name'])){
				$_SESSION['taken'] = 0;
			}
			
			if($_SESSION['taken'] == 1){
				$myfile = fopen("surveys.txt", "w+") or die("Unable to open file!");
				fwrite($myfile, "Survey for {$name}:");
				if(!empty($phone)){
					fwrite($myfile,$phone);
				}
				if(!empty($happy)){
					fwrite($myfile,$happy);
				}
				if (!empty($movies)){
					foreach($movies as $i){
						fwrite($myfile,$i);
					}
				}
				if(!empty($enjoy)){
					fwrite($myfile,$enjoy);
				}
				if(!empty($enjoy)){
					fwrite($myfile,$comment);
				}
				fclose($myfile);
			}
		?>
		</pre>
		<?php
		//print out what the values are
			if($_SESSION['taken'] == 1){
				echo "You've finished your surveys now.<br>";
				echo "Here were your results: <br><br>";
			}
			echo "Hello {$_SESSION['name']}! <br>";
			echo "From our survey, you use a {$_SESSION['phone']} Phone.<br>";
			echo "You seem to be {$_SESSION['happy']} about it.<br>";
			echo "If you have any movie favorites, they are listed here: <br>";
			if (!empty($_SESSION['movies'])){
				foreach($_SESSION['movies'] as $i){
					echo "{$i} <br>";
				}
			}
			echo "We're glad you enjoyed this Survey! <br>";
			echo "Your results were saved. <br>";
			echo "Have a wonderful day!";
		?>
		</div>
	</body>
</html>