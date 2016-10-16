<?php
foreach ($db->query('SELECT salesman.name, appt.pointval, call.pointval, deal.pointval
FROM salesman, appt, call, deal LIMIT 2') as $row)
{
	echo '<tr>';
	echo '<td>' . $row['name'] . '</td>';
	echo '<td>' . $row['pointval'] . '</td>';
	echo '<td>' . $row['pointval'] . '</td>';
	echo '<td>' . $row['pointval'] . '</td>';
	echo '</tr>';
}
	// foreach ($db->query('SELECT info FROM deal') as $row)
	// {
		// echo '<p>';
		// echo '<strong>' . $row['info'] . '</strong>';
		// echo '</p>';
	// }
?>