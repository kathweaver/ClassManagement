<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
$page_title="PreAP Projects";
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
  <h3><font size="2">APCS II Projects</font></h3>
</div>
<ul>
</ul>
</body>
</html>
<?php
ini_set('include_path', '/home/kweavus/public_html/class');
include 'footer.php';
?>
