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
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../../style.css" rel="stylesheet" type="text/css">
</head>

<body>
<div align="center"> 
  <h3><font size="2">APCS I Projects</font></h3>
  <p align="left"><font size="2"><a href="MBSCh2_Assignment1.php">Marine Biology 
    Simulation Assignment #1</a></font></p>
  <p align="left"><font size="2"><a href="MBSCh2_Assignment2.php">Marine Biology 
    Simulation Assignment #2</a></font></p>
  <p align="left"><font size="2"><a href="MBSCh2_Assignment3.php">Marine Biology 
    Simulation Assignment #3</a></font></p>
  <p align="left"><font size="2"><a href="MBSCh2_Assignment4.php">Marine Biology 
    Simulation Assignment #4</a></font></p>
  <p align="left">&nbsp;</p>
</div>
</body>
</html>
<?php
ini_set('include_path', '/home/kweavus/public_html/class');
include 'footer.php';
?>