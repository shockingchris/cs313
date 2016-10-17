<?php include 'dbaccess.php';?>
<html>
<head>
<meta charset="utf-8">
<title>Scriptures</title>
</head>

<body>
<h1>Scripture Resources</h1>
Enter a new Scripture to add:<br>
<input type="text" name="book" size="15"/>
<input type="text" name="chapter" maxlength="3" size="3"/>
: <input type="text" name="verse" maxlength="3" size="3"/>
<br><textarea rows="4" cols="40"></textarea>
<br/>
<?php

foreach($db->query("SELECT book, chapter, verse, content
	FROM scripture") as $row){
	echo '<b>' . $row['book'] . ' ';
	echo $row['chapter'] . ':';
	echo $row['verse'] . "</b>";
	echo ' - \"' . $row['content'] . '\"<br><br>';
}

?>

</body>
</html>   


