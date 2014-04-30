<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
$page_title="Computer Science HowTo - Working from Home";
include 'header.php';
?>
<p><strong>How To's for Computer Science</strong></p>
<ul>
  <li><a href="WorkFromHome.php">Work from Home</a> </li>
</ul>
<HR />
<?php
ini_set('include_path', '/home/kweavus/public_html/class');
include 'footer.php';
?>