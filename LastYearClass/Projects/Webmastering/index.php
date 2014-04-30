<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
$page_title="Webmastering Projects";
include 'header.php';
?>

<body>
<div align="center"> 
  <h3><font size="2">Webmastering Projects</font></h3>
</div>
<ul>
  <li> <a href="DreamComputer/index.php">Dream Computer</a></li>
  <li><a href="powerpoint.htm">Powerpoint</a></li>
  <li><a href="CopyRight/index.php">CopyRight</a></li>
  <li><a href="wintercard.php">Winter Greeting Card Website</a></li>
  <li><a href="Sampler.php">Sampler Website</a></li>
  <li><a href="final.php">Final Project -- Website</a></li>
</ul>
</body>
</html>
<?php
ini_set('include_path', '/home/kweavus/public_html/class');
include 'footer.php';
?>