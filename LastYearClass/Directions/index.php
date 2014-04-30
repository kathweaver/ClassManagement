<?php
session_start();
ini_set('include_path', '/home/kathweav/public_html/class');
include 'sessionchecker.php';
session_checker();
$page_title="Webmastering Projects";
include 'header.php';
?>
<body>
<div align="center"> 
  <h3><font size="2">Detailed Directions</font></h3>
</div>
<ul>
  <li><a href="Webmastering/index.php">Webmastering</a></li>
</ul>
</body>
<?php
ini_set('include_path', '/home/kathweav/public_html/class');
include 'footer.php';
?>