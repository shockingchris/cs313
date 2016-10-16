<?php
foreach ($db->query("SELECT name FROM salesman WHERE name='Joel Simmons'") as $row)
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