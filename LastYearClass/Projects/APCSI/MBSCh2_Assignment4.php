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
    MBS Programing Assignment 4 
  </CENTER></h2>
<ol>
  <li>Begin with the project you created and finished for <a href="MBSCh2_Assignment3.php">Assignment 
    3</a>.</li>
  <li> Change how you accomplish the changes for Assignment
<ol>
      <li>Erase all the code in the Fish nextLocation method. Replace with code 
        that returns the location behind the fish if it's empty, of the current 
        location otherwise.</li>
      <li>Add code to the Fish move method to change is color if it changes position.</li>
      <li>Erase all the &quot;number 8&quot; related code in <font face="Courier New, Courier, mono">FishStuff12</font>. 
        Replace it with code that causes each fish in the environment to <font face="Courier New, Courier, mono">act</font>.</li>
      <li>Display the environment after every successful move.</li>
    </ol>
  </li>
  <li>Compress your folder and submit it. 
    <p>&nbsp;</p>
  </li>
</ol>
</body>
</html>
<?php
ini_set('include_path', '/home/kweavus/public_html/class');122
include 'footer.php';
?>