<?php
foreach ($db->query('SELECT salesman.name, appt.apptval, call.callval, deal.dealval
FROM salesman, appt, call, deal LIMIT 2') as $row)
{
	echo '<tr>';
	echo '<td>' . $row['name'] . '</td>';
	echo '<td>' . $row['callval'] . '</td>';
	echo '<td>' . $row['apptval'] . '</td>';
	echo '<td>' . $row['dealval'] . '</td>';
	echo '<td>' . '45' . '</td>';
	echo '</tr>';
}
	// foreach ($db->query('SELECT info FROM deal') as $row)
	// {
		// echo '<p>';
		// echo '<strong>' . $row['info'] . '</strong>';
		// echo '</p>';
	// }
?>