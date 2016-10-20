<?php include 'dbaccess.php';?>
<?php
	print_r($_POST);
	if(isset($_POST['submit'])){
		echo "We made it submit!";
		$book = isset($_POST['book']) ? $_POST['book'] : '';
		$chapter = isset($_POST['chapter']) ? $_POST['chapter'] : ''; 
		$verse = isset($_POST['verse']) ? $_POST['verse'] : ''; 
		$content = isset($_POST['content']) ? $_POST['content'] : '';
		$topics = isset($_POST['topics']) ? $_POST['topics'] : ''; 
	}
	else{
		echo "didn't submit";
		$book = '';
		$chatper ='';
		$verse ='';
		$content='';
		$topics='';
	}

	if(isset($_POST['submit'])){
		echo "did an insert!";
		$stmt = $db->prepare('INSERT INTO scripture(book, chapter, verse, content)
						VALUES("$book", "$chapter", "$verse", "$content")');
		$stmt->bindParam("$book", $book, PDO::PARAM_STR, 100);
		$stmt->bindParam("$chapter", $book, PDO::PARAM_INT);
		$stmt->bindParam("$verse", $book, PDO::PARAM_INT);
		$stmt->bindParam("$book", $book, PDO::PARAM_STR, 100);
		$stmt->execute();
		
		echo "<br>$book";
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
<br><textarea name="content" rows="4" cols="40"></textarea>
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
<button type='submit' name='submit' value='submit'>Submit</button>
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
