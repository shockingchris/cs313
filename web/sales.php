<?php include 'dbaccess.php';?>
<?php
	echo "<br><br>";
	print_r($_POST);
	if(isset($_POST['submit'])){
		//echo "We made it submit!";
		$salesman = isset($_POST['salesman']) ? $_POST['salesman'] : '';
		$newperson = isset($_POST['newperson']) ? $_POST['newperson'] : ''; 
		$incentive = isset($_POST['incentive']) ? $_POST['incentive'] : ''; 
		$newtopic = isset($_POST['newtopic']) ? $_POST['newtopic'] : '';
		$submit = $_POST['submit'];
	}
	else{
		//echo "didn't submit";
		$salesman = '';
		$incentive ='';
		$newtopic='';
		$newId='';
		$newTopicId='';
	}
	
	if(isset($_POST['newperson'])){
		$stmt = $db->prepare("INSERT INTO salesman(name)
						VALUES(:name)");
		$stmt->bindParam(":name", $newperson, PDO::PARAM_STR, 100);
		$stmt->execute();
	}
	
	$newPersonId = $db->lastInsertId();
?>
<html>
<head>
	<link rel="stylesheet" href="/intro.css"/>
	<link rel="stylesheet" href="/table.css"/>
</head>
<body>
<div class="top"><?php include 'topnavbars.php';?></div>
<div class="left"><?php include 'leftnavbars.php';?></div>
<div class="main">
<h1>Salesman Information</h1>

<table class="responstable">
  
  <tr>
    <th>Salesperson</th>
    <th>Calls (15)</th>
    <th>Appointments(15)</th>
	<th>Deals (15)</th>
	<th>Total</th>
  </tr>

<?php
foreach ($db->query('SELECT salesman.name, appt.apptval, call.callval, deal.dealval
FROM salesman, appt, call, deal LIMIT 2') as $row)
{
	$name = isset($row['name']) ? $row['name'] : '';
	$callval = isset($row['callval']) ? $row['callval'] : 0;
	$dealval = isset($row['dealval']) ? $row['dealval'] : 0;
	$apptval = isset($row['apptval']) ? $row['apptval'] : 0;
	echo '<tr>';
	echo '<td>' . $row['name'] . '</td>';
	echo '<td>' . $row['callval'] . '</td>';
	echo '<td>' . $row['apptval'] . '</td>';
	echo '<td>' . $row['dealval'] . '</td>';
	$total = 0;
	$total = $row['callval'] + $row['apptval'] + $row['dealval'];
	echo '<td>' . $total . '</td>';
	echo '</tr>';
}
?>
  
</table>
<br/>
Following Salesman available to search info:<br>
<?php
	foreach($db->query("SELECT name FROM salesman") as $row)
		{
			echo $row['name'] . '<br>';
		}
?>

<br/>
Add a new Salesman: 
<form action='' method="POST">
<input type="text" name="newperson"/>
<button type="submit" name="submit" value="submit">Submit</button>
</form>

<br>See a salesman's sales info: <br/>
<form action="" method="POST">
<input type="text" name="salesname"/><br/>
<button type="submit" name="submit" value="submit">Submit</button>
</form>

<?php 
	if(isset($_POST['salesname'])){
		$salesname = $_POST['salesname'];
		echo "<br>Information for {$salesname}:<br>";
		echo "Appointments:<br>";
		foreach($db->query("SELECT salesman.name, appt.ainfo FROM
				salesman INNER JOIN appt ON salesman.id=appt.user_id
				WHERE salesman.name='$salesname'") as $row)
		{
			echo $row['ainfo'] . '<br>';
		}
		echo "<br>Calls:<br>";
		foreach($db->query("SELECT salesman.name, call.cinfo FROM
				salesman INNER JOIN call ON salesman.id=call.user_id
				WHERE salesman.name='$salesname'") as $row)
		{
			echo $row['cinfo'] . '<br>';
		}
		echo "<br>Deals Closed:<br>";
		foreach($db->query("SELECT salesman.name, deal.dinfo FROM
				salesman INNER JOIN deal ON salesman.id=deal.user_id
				WHERE salesman.name='$salesname'") as $row)
		{
			echo $row['dinfo'] . '<br>';
		}
	}
?>
</div>
</body>
</html>