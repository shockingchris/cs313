<?php include 'dbaccess.php';?>
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
    <th>Appointments (15)</th>
	<th>Deals (15)</th>
	<th>Total</th>
  </tr>

<?php include 'queries.php';?>

  <tr>
    <td>Kelsi Simmons</td>
    <td>15</td>
    <td>15</td>
	<td>15</td>
	<td>45</td>
  </tr>
  
  <tr>
    <td>Angie Simmons</td>
    <td>15</td>
    <td>15</td>
	<td>15</td>
	<td>45</td>
  </tr>
  
</table>
<br/>
<form action="" method="POST">
Following Salesman available to search info:<br>
<?php
	foreach($db->query("SELECT name FROM salesman") as $row)
		{
			echo $row['name'] . '<br>';
		}
?>
See a salesman's sales info: <br/>
<input type="text" name="salesname"/><br/>
<button type="submit" name="submit" value="submit">Submit</button>
<?php 
	if(isset($_POST['salesname'])){
		$salesname = $_POST['salesname'];
		echo "<br>Information for {$salesname}:<br>";
		echo "Appointments:<br>";
		foreach($db->query("SELECT salesman.name, appt.ainfo FROM
	salesman, appt WHERE salesman.name='$salesname'") as $row)
		{
			echo $row['ainfo'] . '<br>';
		}
		echo "<br>Calls:<br>";
		foreach($db->query("SELECT salesman.name, call.cinfo FROM
		salesman, call WHERE salesman.name='$salesname'") as $row)
		{
			echo $row['cinfo'] . '<br>';
		}
		echo "<br>Deals Closed:<br>";
		foreach($db->query("SELECT salesman.name, deal.dinfo FROM
		salesman, deal WHERE salesman.name='$salesname'") as $row)
		{
			echo $row['dinfo'] . '<br>';
		}
	}
?>
</form>
</div>
</body>
</html>