<?php
foreach ($db->query('SELECT salesman.name, appt.pointval, call.pointval, deal.pointval
FROM salesman, appt, call, deal LIMIT 2') as $row)
{
	echo '<td>' . $row['name'] . '</td>';
	echo '<td>' . $row['call.pointval'] . '</td>';
	echo '<td>' . $row['appt.pointval'] . '</td>';
	echo '<td>' . $row['deal.pointval'] . '</td>';
}
SELECT salesman.name, appt.pointval, call.pointval, deal.pointval
FROM salesman, appt, call, deal LIMIT 2;
	// foreach ($db->query('SELECT info FROM deal') as $row)
	// {
		// echo '<p>';
		// echo '<strong>' . $row['info'] . '</strong>';
		// echo '</p>';
	// }
?>