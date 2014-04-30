<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
$page_title="General HowTos";
include 'header.php';
?>
<p><strong>How To's for PreAP</strong></p>
<ul>
  <li><a href="WindowsMessager/WindowsMessager_Initial.html">Windows Messenger - Initial Setup (No .Net Passport)</a> </li>
    <li><a href="WindowsMessager/WindowsMessagerPassport.html">Windows Messenger with Passport</a> </li>
</ul>
<HR />
<?php
ini_set('include_path', '/home/kweavus/public_html/class');
include 'footer.php';
?>
