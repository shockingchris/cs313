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
	<th></th>
  </tr>
  
  <tr>
    <td><?php $db->query('SELECT name FROM salesman WHERE user_id=1')?></td>
    <td></td>
    <td>Salesman</td>
	<td>Yes</td>
  </tr>
  
  <tr>
    <td><?php $db->query('SELECT name FROM salesman WHERE user_id=1')?></td>
    <td>01/01/1985</td>
    <td>Salesman</td>
	<td>Yes</td>
  </tr>
  
  <tr>
    <td>Kelsi Simmons</td>
    <td>01/01/1990</td>
    <td>Saleswoman</td>
	<td>No</td>
  </tr>
  
  <tr>
    <td>Angie Simmons</td>
    <td>01/01/1990</td>
    <td>Saleswoman</td>
	<td>No</td>
  </tr>
  
</table>

<?php include 'queries.php';?>
</div>
</body>
</html>