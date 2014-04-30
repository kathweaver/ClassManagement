<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
$page_title="APCS Projects";
include 'header.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>MBS Chapter 2 Programing Assignment 1</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../../style.css" rel="stylesheet" type="text/css">
</head>

<body>
<h2><CENTER>
    MBS Programing Assignment 3 
  </CENTER></h2>
<ol>
  <li>Begin with the project you created and finished for <a href="MBSCh2_Assignment2.php">Assignment 
    2</a>.</li>
  <li>Attempt to move each fish backwards -- you can move only to a location that 
    is empty. 
    <ol>
      <li>Turn the fish pink</li>
      <li>Make sure the fish is facing the correct direction after it moves.</li>
      <li>Display the environment after every successful move.</li>
    </ol>
  </li>
  <li>Compress your folder and submit it.
    <p>You will need to use at the very least the following:</p>
    <ul>
      <li><font face="Courier New, Courier, mono">allObjects</font></li>
      <li><font face="Courier New, Courier, mono">emptyNeighbors</font></li>
      <li><font face="Courier New, Courier, mono">isEmpty</font></li>
      <li><font face="Courier New, Courier, mono">reverse</font></li>
      <li><font face="Courier New, Courier, mono">changeLocation</font></li>
      <li><font face="Courier New, Courier, mono">changeDirection</font></li>
      <li><font face="Courier New, Courier, mono">changeColor -- you will need 
        to write this function</font></li>
    </ul>
  </li>
</ol>
</body>
</html>
<?php
ini_set('include_path', '/home/kweavus/public_html/class');
include 'footer.php';
?>