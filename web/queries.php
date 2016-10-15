<?php
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
?>