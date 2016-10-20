<?php include 'dbaccess.php';?>
<?php
	if(isset($_POST['submit'])){
		$book = isset($_POST['book']) ? $_POST['book'] : '';
		$chapter = isset($_POST['chapter']) ? $_POST['chapter'] : ''; 
		$verse = isset($_POST['verse']) ? $_POST['verse'] : ''; 
		$content = isset($_POST['content']) ? $_POST['content'] : '';
		$topics = isset($_POST['topics']) ? $_POST['topics'] : ''; 
	}

	if(isset($_POST['submit'])){
		foreach($db->query('INSERT INTO scripture(book, chapter, verse, content)
							VALUES("$book", "$chapter", "$verse", "$content");');
		}
?>
<html>
<head>
<meta charset="utf-8">
<title>Scriptures</title>
</head>

<body>
<h1>Scripture Resources</h1>
Enter a new Scripture to add:<br>
<form action='' method='POST'>
<input type="text" name="book" size="15"/>
<input type="text" name="chapter" maxlength="3" size="3"/>
: <input type="text" name="verse" maxlength="3" size="3"/>
<br><textarea rows="4" cols="40"></textarea>
<br/>
Topics:  <br>
<?php
foreach($db->query('SELECT name FROM topics') as $row)
{
	echo "<input type='checkbox' name='topics[]' value='" .
	$row['name'] . "'>" . " " . $row['name'] . "<br/>" ;
}
?>
<input type='checkbox' name='topics[]' value=''/>
<input type='text' name='newtopic' size='12' value=''/><br/>
<button type='submit' name='submit' value='Submit'>Submit</button>
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
