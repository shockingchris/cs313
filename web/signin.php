<?php include 'dbaccess.php';?>
<?php 
	print_r($_POST);
	if(isset($_POST['submit'])){
		echo "We made it submit!";
		$salesman = isset($_POST['salesman']) ? $_POST['salesman'] : '';
		$submit = $_POST['submit'];
	}
	else{
		echo "didn't submit";
		
	}
	
	if($submit=='login'){
		
	}
	
	if($submit=='signup'){
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
		<a href="signup.php"><button>Sign Up</button></a>
		</td>
		</table>
		</form>
	
</body>
</html>