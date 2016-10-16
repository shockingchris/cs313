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
See a salesman's sales info: <br/>
<input type="text" name="salesname"/><br/>
<button type="submit" name="submit" value="submit">Submit</button>
<?php print_r($_POST);?>
</form>
</div>
</body>
</html>