<?php include 'dbaccess.php';?>
<?php 
	print_r($_POST);
	if(isset($_POST['submit'])){
		echo "We made it submit!";
		$username = isset($_POST['username']) ? $_POST['username'] : '';
		$password = isset($_POST['password']) ? $_POST['password'] : '';
		$submit = $_POST['submit'];
		echo $username . " " . $password . " ";
		$hash = password_hash($password, PASSWORD_DEFAULT);
		echo $hash;
	}
	else{
		echo "didn't submit";
		$username='';
		$password='';
		
	}
	
	if($_POST['submit']=='login'){
		echo "logging in";
		$hash = password_hash($password, PASSWORD_DEFAULT);
		echo $hash . "\n";
	}
	else{
		echo "{$password}" . "\n";
	}
	
	if($_POST['submit']=='signup'){
		header('Location: ' . 'signup.php', true, 303);
		die();
	}
	
?>
<html>
  <head>
<head>
	<title>Sign Up Page</title>
	<link rel="stylesheet" href="/intro.css"/>
	<link rel="stylesheet" href="/table.css"/>
</head>
  <body>
	<h2>Sign Up You Lameos!</h2>
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
		<button type="submit" name="submit" value="signup" width="100px">Sign Up</button>
		</td>
		</table>
		</form>
	<br><br>
	<?php
	if($_POST['submit']=="login"){
		echo "logging in";
		$hash = password_hash($password, PASSWORD_DEFAULT);
		echo $hash . "\n";
	}
	else{
		echo "{$password}" . "\n";
	}
	?>
</body>
</html>