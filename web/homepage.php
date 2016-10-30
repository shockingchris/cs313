<?php
	if(!isset($_SESSION['loggedin'])){
		header("Location: " . "signin.php", true, 303);
		die();
	}
?>
<html>
  <head>
    <meta charset="utf-8"/>
    <title>Chris Simmons' Homepage</title>
	<link href="intro.css" rel="stylesheet"/>
  </head>
  <body>
    <h1>Welcome to Chris' Personal Page
    </h1>
    <hr>
    <table>
      <tr>
        <td>
          <p><b>My name is Christopher Simmons</b>. I am a Software Engineering
            major at BYUI<br> and I am hoping to work for mobile apps companies
            to design Phone and Computer apps.<br>I am from Eagle, Idaho but
            originally I am from Huntington Beach, California.</p>
          <p>My favorite quote is found on <strong>Goodreads</strong> from Ella
            Wheeler Wilcoxs
          </p>
          <blockquote cite="http://www.goodreads.com/quotes/822-there-is-no-chance-no-destiny-no-fate-that-can">
            <em>There is no chance, no destiny, no fate,<br> that can
              circumvent, or hinder or control<br> the firm resolve of a
              determined soul.
            </em>
          </blockquote>
          </td>
        <td>
          <img src="http://catalinapublications.com/images/HBPier.jpg"
               width="366" alt="HBPier JPEG">
        </tr>
    </table>
    <table>
        <tr>
        <th>Class</th>
        <th>Section</th>
        <th>Teacher</th>
        <th>Time</th>
      </tr>
      <tr>
        <td>Web Dev</td>
        <td>CS 313</td>
        <td>Lyon</td>
        <td>Online</td>
      </tr>
    </table>
    <hr>
    <a href="index.php">CS 313 Assignments</a>
	<script type='text/javascript'/>
  </body>
</html>
