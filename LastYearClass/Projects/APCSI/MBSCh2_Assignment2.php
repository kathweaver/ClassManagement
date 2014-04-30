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
    MBS Programing Assignment 2 
  </CENTER></h2>
<ol>
  <li>Begin with the project you created and finished for<a href="MBSCh2_Assignment1.php"> 
    Assignment 1</a></li>
  <li>Have your fish &quot;breed&quot; into each empty location that is adjacent 
    to a red fish. 
    <ol>
      <li>The new fish must be green </li>
      <li>The new first must be pointing in the same direction as the &quot;parent&quot; 
        fish. </li>
    </ol>
  </li>
  <li>Display the environment after you add each fish.</li>
  <li>Compress your folder and submit it.</li>
</ol>
<p>You will need to use at the very least the following:</p>
<ul>
  <li><font face="Courier New, Courier, mono">allObjects</font></li>
  <li><font face="Courier New, Courier, mono">emptyNeighbors</font></li>
  <li><font face="Courier New, Courier, mono">isEmpty</font></li>
</ul>
<p>&nbsp;</p>
</body>
</html>
<?php
ini_set('include_path', '/home/kweavus/public_html/class');
include 'footer.php';
?>