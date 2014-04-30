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
    <p align="left"><em>I have learned today, that you already have done a project 
      similar to this one. It is located on page 83 of the FUNdamental book.</em></p>
    <p align="left"><em>I suggest that you take your original project and copy 
      the folder holding it to a new folder. Call it New Paper, Scissors, Rock. 
      That way, if you make a mistake you won't lose your original copy. Besides, 
      your version is also interesting.</em></p>
    <p align="left"><em>I want to make some changes to that project.</em></p>
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
      <li>Scissors cuts paper -- meaning that scissors wins when scissors and 
        paper are picked</li>
      <li>Paper covers rock -- meaning that paper wins when paper and rock are 
        picked</li>
    </ul>
  </div>
  <p align="left">If both players pick the same thing, it results in a tie. </p>
  <p align="left">Creating a program to have a person play against the computer 
    is a classical computer science problem, as it requires the use of a random 
    number generator and if statements. In particular, writing this program tests 
    the programmers ability to handle the AND statement. </p>
  <p align="left"><em>First, change your project so that it plays against the 
    computer. The formula for generating a random number in VB is</em><br>
    Int((highnumber - lownumber +1) * Rnd + lownumber)</p>
  <p align="left"><em>Rnd is the random number function in Visual Basic (see page 
    41 in the FUNdamentals book).</em></p>
  <p align="left"><em><strong>Additional Requirements</strong></em></p>
</div>
<ul>
  <li> 
    <div align="left"><em><strong>Make the program repeat 3 times</strong></em></div>
  </li>
  <li><em><strong>Report the winner after 3 times.</strong></em></li>
</ul>
<div align="center">
  <p align="left"><em>The additional requirements include elements from Chapter 
    6. </em></p>
  <p align="left"><strong>Rubric:</strong></p>
  <p align="left"><strong>0 points - the original two player game</strong></p>
  <p align="left"><strong>50 points - non-working program which is an honest attempt 
    to solve the problem</strong></p>
  <p align="left"><strong>70 points - working program which reports incorrect 
    results</strong></p>
  <p align="left"><strong>80 points - working program with a minimal graphical 
    interface </strong></p>
  <p align="left"><strong>90 points - original requirements</strong></p>
  <p align="left"><strong>100 points - additional requirements</strong></p>
</div>
<div align="center"></div>
</body>
</html>
<?php
ini_set('include_path', '/home/kweavus/public_html/class');
include 'footer.php';
?>