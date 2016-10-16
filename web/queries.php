<?php
foreach ($db->query("SELECT * FROM salesman WHERE name='Joel Simmons'") as $row)
{
	echo '<td>' . $row['name'] . '</td>';
}

	// foreach ($db->query('SELECT info FROM deal') as $row)
	// {
		// echo '<p>';
		// echo '<strong>' . $row['info'] . '</strong>';
		// echo '</p>';
	// }
?>