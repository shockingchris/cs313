<?php
try {
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

}
catch (PDOException $ex) {
	print "<p>error: $ex->getMessage() </p>\n\n";
	die();
}

foreach ($db->query('SELECT name FROM salesman WHERE name="Joel Simmons"') as $row)
{
	echo $row['name'];
}
	// foreach ($db->query('SELECT info FROM deal') as $row)
	// {
		// echo '<p>';
		// echo '<strong>' . $row['info'] . '</strong>';
		// echo '</p>';
	// }
?>