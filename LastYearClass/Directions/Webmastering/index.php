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
  <h3>Detailed Directions for Webmastering</h3>
</div>
<ul>
  <li><font size="2"><a href="PSDtoWeb_Font.php">Changing a PSD to a Image and 
    putting it on a Web Page (Font Assignment) </a></font></li>
</ul>
</body>
<?php
ini_set('include_path', '/home/kathweav/public_html/class');
include 'footer.php';
?>