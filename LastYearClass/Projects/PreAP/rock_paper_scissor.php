<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
$page_title="CSI Projects";
include 'header.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<div align="center"> 
  <h3>&nbsp;</h3>
  <div align="center">
<h3><font size="2">Rock Paper Scissors - Part I</font></h3>
    <p align="left">Rock, Paper, Scissors is an ancient game which is often used 
      to decide which of two people get to do something. Often it is played in 
      groups of three games, and the winner of the third game &quot;wins&quot;.</p>
    <p align="left">Here's the basic concept. There are two players. Each player 
      chooses rock, paper, or scissors. Winning is determined on the following 
      sayings:</p>
  </div>
  <div align="left">
    <ul>
      <li> Rock breaks Scissors -- meaning that rock wins when rock and scissors 
        are picked</li>
      <li> Scissors cuts paper -- meaning that scissors wins when scissors and 
        paper are picked</li>
      <li>Paper covers rock -- meaning that paper wins when paper and rock are 
        picked</li>
    </ul>
  </div>
  <p align="left">If both players pick the same thing, it results in a tie. </p>
  <p align="left">Creating a program to have a person play against the computer 
    is a classical computer science problem as it requires the use of a random 
    number generator and if statements. In particular, writing this program tests 
    the programmers ability to handle the AND statement. </p>
  <p align="left"><strong>Rubric:</strong></p>
  <p align="left"><strong>50 points - non-working program which is an honest attempt 
    to solve the problem</strong></p>
  <p align="left"><strong>70 points - working program which reports incorrect 
    results</strong></p>
  <p align="left"><strong>80 points - working program with text input and output</strong></p>
  <p align="left"><strong>100 points - WOW me with a graphical interface</strong></p>
</div>
</body>
</html>
<?php
ini_set('include_path', '/home/kweavus/public_html/class');
include 'footer.php';
?>