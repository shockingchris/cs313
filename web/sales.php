<?php include 'dbaccess.php';?>
<?php
	echo "<br><br>";
	print_r($_POST);
	if(isset($_POST['submit'])){
		//echo "We made it submit!";
		$salesman = isset($_POST['salesman']) ? $_POST['salesman'] : '';
		$newperson = isset($_POST['newperson']) ? $_POST['newperson'] : '';
		$deletedPerson = isset($_POST['deletedPerson']) ? $_POST['deletedPerson'] : '';
		$incentive = isset($_POST['incentive']) ? $_POST['incentive'] : ''; 
		$newtopic = isset($_POST['newtopic']) ? $_POST['newtopic'] : '';
		$submit = $_POST['submit'];
	}
	else{
		//echo "didn't submit";
		$salesman = '';
		$incentive ='';
		$newId='';
		$newTopicId='';
	}
	
	if($submit == 'deletePerson'){
		echo "deleting";
		$stmt = $db->prepare("DELETE FROM salesman WHERE name=':deletedPerson'");
		$stmt->bindparam(":deletedPerson", $deletedPerson, PDO::PARAM_STR, 100);
		$stmt->execute();
	}
	
	if($newperson=='addPerson'){
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
<?php
// <table class="responstable">
  
  // <tr>
    // <th>Salesperson</th>
    // <th>Calls (15)</th>
    // <th>Appointments(15)</th>
	// <th>Deals (15)</th>
	// <th>Total</th>
  // </tr>

// <?php
// foreach ($db->query('SELECT salesman.name, appt.apptval, call.callval, deal.dealval
// FROM salesman, appt, call, deal LIMIT 3') as $row)
// {
	// $name = isset($row['name']) ? $row['name'] : '';
	// $callval = isset($row['callval']) ? $row['callval'] : 0;
	// $dealval = isset($row['dealval']) ? $row['dealval'] : 0;
	// $apptval = isset($row['apptval']) ? $row['apptval'] : 0;
	// echo '<tr>';
	// echo '<td>' . $name . '</td>';
	// echo '<td>' . $callval . '</td>';
	// echo '<td>' . $apptval . '</td>';
	// echo '<td>' . $dealval . '</td>';
	// $total = 0;
	// $total = $row['callval'] + $row['apptval'] + $row['dealval'];
	// echo '<td>' . $total . '</td>';
	// echo '</tr>';
// } 
?>
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
<button type="submit" name="submit" value="addPerson">Submit</button>
</form>

Delete an existing Salesman: 
<form action='' method="POST">
<input type="text" name="deletedPerson"/>
<button type="submit" name="submit" value="deletePerson">Delete</button>
</form>

<br>See a salesman's sales info: <br/>
<form action="" method="POST">
<input type="text" name="salesname"/><br/>
<button type="submit" name="submit" value="info">Submit</button>
</form>

<?php 
	if(isset($_POST['salesname'])){
		$salesname = $_POST['salesname'];
		echo "Information for {$salesname}:<br>";
		echo "Appointments:<br>";
		$apptTotal = 0;
		$callTotal = 0;
		$dealTotal = 0;
		foreach($db->query("SELECT salesman.name, appt.ainfo FROM
				salesman INNER JOIN appt ON salesman.id=appt.user_id
				WHERE salesman.name='$salesname'") as $row)
		{
			echo $row['ainfo'] . '<br>';
			$apptTotal+= 1;
		}
		echo "Total Appointments: " . $apptTotal . "<br>";
		echo "<br>Calls:<br>";
		foreach($db->query("SELECT salesman.name, call.cinfo FROM
				salesman INNER JOIN call ON salesman.id=call.user_id
				WHERE salesman.name='$salesname'") as $row)
		{
			echo $row['cinfo'] . '<br>';
			$callTotal+= 1;
		}
		echo "Total Calls: " . $apptTotal . "<br>";
		echo "<br>Deals Closed:<br>";
		foreach($db->query("SELECT salesman.name, deal.dinfo FROM
				salesman INNER JOIN deal ON salesman.id=deal.user_id
				WHERE salesman.name='$salesname'") as $row)
		{
			echo $row['dinfo'] . '<br>';
			$dealTotal+= 1;
		}
		echo "Total Deals: " . $apptTotal . "<br>";
	}
?>
</div>
</body>
</html>