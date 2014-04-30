<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
$page_title="PreAP HowTo - Working from Home";
include 'header.php';
?>
<p><strong>How To's</strong></p>
<ul>
  <li><a href="CS/index.php">Computer Science I </a></li>
  <li><a href="PreAP/index.php">Computer Science I - PreAP</a> </li>
  <li><a href="APCS/index.php">AP Computer Science (Both I and II)</a> </li>
  <li><a href="General/index.php">General How To's</a></li>
</ul>
<?php
ini_set('include_path', '/home/kweavus/public_html/class');
include 'footer.php';
?>