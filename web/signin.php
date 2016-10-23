<?php include 'dbaccess.php';?>
<html>
  <head>
<head>
	<title>Sign In Page</title>
	<link rel="stylesheet" href="/intro.css"/>
	<link rel="stylesheet" href="/table.css"/>
</head>
  <body>
	<div class="top">
	    <ul class="topbar">
            <li class="toplist"><a href="homepage.html">Home Page</a></li>
            <li class="toplist"><a>Games</a></li>
            <li style="float:right" class="toplist" class="active"><a href="signin.php">Login</a></li>
            </ul>
    </div>
	<div class="left">
        <ul class="leftbar">
            <li class="leftlist"><a href="index.html">Assignments Page</a></li>
            <li class="leftlist"><a href="survey.php">Survey</a></li>
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
		<h1>Sign In Here</h1>
		<br>
		<form action='' method='POST'>
		<table align="center" class="responstable">
		<tr>
		<th colspan="2">Enter a Username and Password</th>
		</tr><tr>
		<td>Username:</td>
		<td><input type="text" name="username" size="15"/></td>
		</tr><tr>
		<td>Password:</td>
		<td><input type="password" name="pass" size="15"/></td>
		</tr>
		</table>
		</form>
	</div>
	
</body>
</html>