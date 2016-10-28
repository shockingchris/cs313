<?php include 'dbaccess.php';?>
<?php

	//print_r($_POST);
	if(isset($_POST['submit'])){
		//echo "We made it submit!";
		$submit = $_POST['submit'];
	}
	else{
		//echo "didn't submit";
		
	}
	if($submit=='login'){
		$lifetime = 3600 * 24 * 365;
		session_set_cookie_params($lifetime, '/');
		session_start();
		
	if (!empty($_POST['username'])) {
		// Get the username and password
		$username = filter_input(INPUT_POST, 'username');
		$pass = filter_input(INPUT_POST, 'pass');

		// Check if password is correct
		$query = "SELECT id, password FROM login WHERE username = '$username'";
		$user_info = $db->query($query)->fetch();
		
		if (password_verify($pass, $user_info['password'])) {
			$_SESSION['user_id'] = $user_info['id'];
			$_SESSION['username'] = $username;
			header("Location: homepage.html");
		}
		}
	}
	if($submit=='signup'){
		header('Location: ' . 'signup.php', true, 303);
		die();
	}
	
?>
<html>
  <head>
<head>
	<title>Sign In Page</title>
	<link rel="stylesheet" href="/intro.css"/>
	<link rel="stylesheet" href="/table.css"/>
</head>
  <body>
	<h2>Welcome Lameos!</h2>
		<form action='' method='POST'>
		<table align="center" class="responstable">
		<tr>
		<th colspan="2">Enter Your Username and Password</th>
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
	
</body>
</html>