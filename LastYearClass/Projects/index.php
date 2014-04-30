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
  <h3><font size="2">Projects</font></h3>
</div>
<ul>
  <li><a href="CSI/index.php">CSI</a></li>
  <li><a href="PreAP/index.php">PreAP</a></li>
  <li> <a href="APCSI/index.php">APCSI</a></li>
  <li> <a href="APCSII/index.php">APCSII</a></li>
  <li> <a href="Webmastering/index.php">Webmastering</a></li>
</ul>
</body>
<?php
ini_set('include_path', '/home/kweavus/public_html/class');
include 'footer.php';
?>