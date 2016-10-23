<?php include 'dbaccess.php';?>
<?php 
	print_r($_POST);
?>
<html>
  <head>
<head>
	<title>Sign In Page</title>
	<link rel="stylesheet" href="/intro.css"/>
	<link rel="stylesheet" href="/table.css"/>
</head>
  <body>
	<h1>
		<br><br>
		<form action='' method='POST'>
		<table align="center" class="responstable">
		<tr>
		<th colspan="2">Enter a Username and Password</th>
		</tr><tr>
		<td>Username:</td>
		<td><input type="text" name="username" size="15"/></td>
		</tr><tr>
		<td>Password:</td>
		<td><input type="password" name="pass" size="15"/></td>
		</tr><tr>
		<td colspan="2">
		<button type="submit" name="submit" value="login" width="100px">Log In</button>
		</td>
		</table>
		</form>
	
</body>
</html>