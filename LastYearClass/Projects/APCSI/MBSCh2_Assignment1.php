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
    MBS Programing Assignment 1
</CENTER></h2>
<ol>
  <li>Copy the starter project to your network folder. The folder is called FishStuff12. 
    You will be editing the FishStuff12.java file.</li>
  <li>Create a bounded environment that has <font face="Courier New, Courier, mono">NUM_ROWS</font> 
    row and <font face="Courier New, Courier, mono">NUM_COLS</font> columns. </li>
  <li>Create a<font face="Courier New, Courier, mono"> SimpleMBSDisplay</font> 
    with a delay of 500 milliseconds and display your empty environment. The following 
    will work:<br>
    <font face="Courier New, Courier, mono">SimpleMBSDisplay display = new SimpleMBSDisplay(env, 
    500);</font></li>
  <li>Add a <font face="Courier New, Courier, mono">randomLocation() </font>method 
    that returns a random location within the environment. This method needs to 
    use <font face="Courier New, Courier, mono">RandomNumGenerator.</font></li>
  <li>Add 10 fish to your environment. These fish need to be 
    <ol>
      <li>at random locations (use your <font face="Courier New, Courier, mono">randomLocation 
        </font>method)</li>
      <li>facing random directions (use <font face="Courier New, Courier, mono">Environment's 
        randomDirection </font>method)</li>
      <li>red</li>
    </ol>
    <p>Make sure that you handle the case where <font face="Courier New, Courier, mono">randomLocation 
      </font>returns a location that already contains a fish. </p>
  </li>
  <li>Display your environment: <font face="Courier New, Courier, mono">display.showEnv();</font></li>
  <li>Compress your folder and submit it.</li>
</ol>
<p><em><font size="-2"><strong>Credit: Assignment taken from Glen Martin at Townview 
  TAG</strong></font></em></p>
</body>
</html>
<?php
ini_set('include_path', '/home/kweavus/public_html/class');
include 'footer.php';
?>