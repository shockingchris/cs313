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

//print "<p>$dbUrl</p>\n\n";

//print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

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