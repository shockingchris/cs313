<?php include 'dbaccess.php';?>
<?php 
	print_r($_POST);
	if(isset($_POST['submit'])){
		echo "We made it submit!";
		$username = isset($_POST['username']) ? $_POST['username'] : '';
		$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
		$passcheck = isset($_POST['passcheck']) ? $_POST['passcheck'] : '';
		$submit = $_POST['submit'];
	}
	else{
		echo "didn't submit";
		$username='';
		$pass='';
		$passcheck='';
	}
	
	if($_POST['submit']=='signup'){
	
function valid_password($pass) {
	$pass_array = str_split($pass);

	if (count($pass_array) < 7) {
		return false;
	}

	if (preg_match('/[A-Za-z]/', $pass) && preg_match('/[0-9]/', $pass)) { 
		return true; 
	}

		return false;
}

if (!empty($_POST['username'])) {
	$username = filter_input(INPUT_POST, 'username');
	$pass = filter_input(INPUT_POST, 'password');
	$passcheck = filter_input(INPUT_POST, 'passcheck');

	if ($pass !== $passcheck) {
		$error = "Both password fields must match";
	}
	else if (!valid_password($pass)) {
		$error = "Password must contain at least 7 characters and at least one number";
	}
	else if (empty($pass)) {
		$error = "Password can't be blank";
	}
	else {
		// Hash the password
		$hash = password_hash($pass, PASSWORD_BCRYPT);

		// Insert username and hash into the database
		$query = "INSERT INTO users "
		. "(username, password)"
		. "VALUES ('$username', '$hash')";
		$db->query($query);

		// Redirect to sign-in page
		header("Location: signin.php");
	}
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
	<?php if (isset($error) && $error != ''): ?>
    <p style="color:red;"><?php echo $error; ?></p>
    <?php endif; ?>
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
		</tr>
		<td>Password:</td>
		<td><input type="password" name="passcheck" size="15"/></td>
		<tr>
		</tr><tr>
		<td colspan="2">
		<button type="submit" name="submit" value="signup" width="100px">Save</button>
		</td>
		</table>
		</form>
	<br><br>
</body>
</html>