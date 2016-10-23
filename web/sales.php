<?php include 'dbaccess.php';?>
<?php
	if(isset($_POST['submit'])){
		//echo "We made it submit!";
		$salesman = isset($_POST['salesman']) ? $_POST['salesman'] : '';
		$newperson = isset($_POST['newperson']) ? $_POST['newperson'] : '';
		$deletedPerson = isset($_POST['deletedPerson']) ? $_POST['deletedPerson'] : '';
		$incentive = isset($_POST['incentive']) ? $_POST['incentive'] : '';
		$newTask = isset($_POST['newTask']) ? $_POST['newTask'] : '';
		$people = isset($_POST['people']) ? $_POST['people'] : '';
		$submit = $_POST['submit'];
		$valu = isset($_POST['valu']) ? $_POST['valu'] : '';;
	}
	else{
		//echo "didn't submit";
		$salesman = '';
		$incentive ='';
		$newId='';
		$newTopicId='';
		$valu = 0;
	}
	
	if($submit == 'deletePerson' && $deletedPerson!=''){
		$stmt = $db->prepare("DELETE FROM salesman WHERE name=:deletedPerson");
		$stmt->bindparam(":deletedPerson", $deletedPerson, PDO::PARAM_STR, 100);
		$stmt->execute();
	}
	
	if($submit=='addPerson' && $newPerson!=''){
		$stmt = $db->prepare("INSERT INTO salesman(name)
						VALUES(:name)");
		$stmt->bindParam(":name", $newperson, PDO::PARAM_STR, 100);
		$stmt->execute();
	}
	
	if($submit=='addTask'){
		echo "inserting";
		$stmt = $db->prepare("INSERT INTO :incentive(info, val, user_id)
						VALUES(:info, :valu, :people)");
		$stmt->bindParam(":incentive", $incentive, PDO::PARAM_STR, 100);
		$stmt->bindParam(":info", $newTask, PDO::PARAM_STR, 100);
		$stmt->bindParam(":valu", $valu, PDO::PARAM_INT);
		$stmt->bindParam(":people", $people, PDO::PARAM_INT);
		$stmt->execute();
		echo "inserted task";
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
<?php print_r($_POST);
	echo"<br>";
	if(isset($submit)){
	echo $submit;
	}
?>
<h1>Salesman Information</h1>
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
<button type="submit" name="submit" value="addPerson">Add</button>
</form>

Delete an existing Salesman: 
<form action='' method="POST">
<input type="text" name="deletedPerson"/>
<button type="submit" name="submit" value="deletePerson">Delete</button>
</form>

Record Work: 
<form action='' method="POST">
<select name="incentive">
	<option value="" size="10em"></option>
	<option value="appt">Appointment</option>
	<option value="call">Call</option>
	<option value="deal">Deal</option>
</select></br>
Task Info: <input type="text" name="newTask"/><br>
Task Amount: <input type="number" name="valu"/><br>
 For : <select name="people">
<?php
	foreach($db->query("SELECT id, name FROM salesman") as $row)
		{
			echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
		}
?>
</select>

<button type="submit" name="submit" value="addTask">Add</button>
</form>

<br>See a salesman's sales info: <br/>
<form action="" method="POST">
<input type="text" name="salesname"/><br/>
<button type="submit" name="submit" value="info">Check</button>
</form>

<?php 
	if(isset($_POST['salesname'])){
		$salesname = $_POST['salesname'];
		echo "Information for {$salesname}:<br>";
		echo "Appointments:<br>";
		$apptTotal = 0;
		$callTotal = 0;
		$dealTotal = 0;
		foreach($db->query("SELECT salesman.name, appt.info FROM
				salesman INNER JOIN appt ON salesman.id=appt.user_id
				WHERE salesman.name='$salesname'") as $row)
		{
			echo $row['info'] . '<br>';
			$apptTotal+= 1;
		}
		echo "Total Appointments: " . $apptTotal . "<br>";
		echo "<br>Calls:<br>";
		foreach($db->query("SELECT salesman.name, call.info FROM
				salesman INNER JOIN call ON salesman.id=call.user_id
				WHERE salesman.name='$salesname'") as $row)
		{
			echo $row['info'] . '<br>';
			$callTotal+= 1;
		}
		echo "Total Calls: " . $callTotal . "<br>";
		echo "<br>Deals Closed:<br>";
		foreach($db->query("SELECT salesman.name, deal.info FROM
				salesman INNER JOIN deal ON salesman.id=deal.user_id
				WHERE salesman.name='$salesname'") as $row)
		{
			echo $row['info'] . '<br>';
			$dealTotal+= 1;
		}
		echo "Total Deals: " . $dealTotal . "<br>";
	}
?>
</div>
</body>
</html>