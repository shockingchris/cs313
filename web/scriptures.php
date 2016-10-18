<?php include 'dbaccess.php';?>
<html>
<head>
<meta charset="utf-8">
<title>Scriptures</title>
</head>

<body>
<h1>Scripture Resources</h1>
Enter a new Scripture to add:<br>
<form>
<input type="text" name="book" size="15"/>
<input type="text" name="chapter" maxlength="3" size="3"/>
: <input type="text" name="verse" maxlength="3" size="3"/>
<br><textarea rows="4" cols="40"></textarea>
<br/>
Topics:  
<?php
foreach($db->query('SELECT name FROM topics') as $row)
{
	echo "<input type='checkbox' name='topic[]' value='" .
	$row['name'] . "'>" . " " . $row['name'] ;
}
?>
<input type='checkbox' name='topics[]' value=''/>
<input type='text' name='newtopic' size='12' value=''/><br/>
<button type='submit' name='submit' value='Submit'/>
</form>
<?php
foreach($db->query("SELECT book, chapter, verse, content FROM scripture") as $row)
{
	echo '<b>' . $row['book'] . ' ';
	echo $row['chapter'] . ':';
	echo $row['verse'] . "</b>";
	echo ' - "' . $row['content'] . '"<br><br>';
}

?>
<!--<script src="ajax.js"-->
</body>
</html>
