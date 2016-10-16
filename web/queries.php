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

// function showinfo($salesname){
	// echo "Information for {$salesname}:<br>";
	// echo "Appointments:<br>";
	// foreach($db->query("SELECT salesman.name, appt.ainfo FROM
	// salesman, appt WHERE salesman.name=$salesname") as $row)
	// {
		// echo $row['ainfo'] . '<br>';
	// }
	// echo "<br>Calls:<br>";
	// foreach($db->query("SELECT salesman.name, call.cinfo FROM
	// salesman, call WHERE salesman.name=$salesname") as $row)
	// {
		// echo $row['cinfo'] . '<br>';
	// }
	// echo "<br>Deals Closed:<br>";
	// foreach($db->query("SELECT salesman.name, deal.dinfo FROM
	// salesman, deal WHERE salesman.name=$salesname") as $row)
	// {
		// echo $row['dinfo'] . '<br>';
	// }
// }
	// foreach ($db->query('SELECT info FROM deal') as $row)
	// {
		// echo '<p>';
		// echo '<strong>' . $row['info'] . '</strong>';
		// echo '</p>';
	// }

?>