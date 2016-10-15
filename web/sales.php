<html>
<head>
	<link rel="stylesheet" href="/intro.css"/>
</head>
<body>
<div class="top"><?php include('topnavbars.php');?></div>
<div class="left"><?php include('leftnavbars.php');?></div>
<div class="main">
<h1>Salesman Information</h1>
<?php

// default Heroku Postgres configuration URL
$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
 // example localhost configuration URL with postgres username and a database called cs313db
 $dbUrl = "postgres://postgres:password@localhost:5432/postgresql-spherical-19977";
}

$dbopts = parse_url($dbUrl);

$dbHost = $dbopts["host"]; 
$dbPort = $dbopts["port"]; 
$dbUser = $dbopts["user"]; 
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

try {
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

	foreach ($db->query('SELECT name FROM salesman') as $row)
	{
		echo '<p>';
		echo '<strong>' . $row['name'] . '</strong>';
		echo '</p>';
	}
	foreach ($db->query('SELECT info FROM deal') as $row)
	{
		echo '<p>';
		echo '<strong>' . $row['info'] . '</strong>';
		echo '</p>';
	}
}
catch (PDOException $ex) {
	print "<p>error: $ex->getMessage() </p>\n\n";
	die();
}

print "<p>$dbUrl</p>\n\n";

print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

/*
SELECT * FROM deal JOIN salesman ON salesman.id=deal.user_id
WHERE salesman.name='Jeff Simmons';
SELECT * FROM appt JOIN salesman ON salesman.id=appt.user_id
WHERE salesman.name='Jeff Simmons';
SELECT * FROM call JOIN salesman ON salesman.id=call.user_id
WHERE salesman.name='Jeff Simmons';
SELECT * FROM deal JOIN salesman ON salesman.id=deal.user_id
WHERE salesman.name='Joel Simmons';
SELECT * FROM appt JOIN salesman ON salesman.id=appt.user_id
WHERE salesman.name='Joel Simmons';
SELECT * FROM call JOIN salesman ON salesman.id=call.user_id
WHERE salesman.name='Joel Simmons';
*/
?>
</div>
</body>
</html>