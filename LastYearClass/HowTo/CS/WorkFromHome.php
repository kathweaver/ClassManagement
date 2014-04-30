<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
$page_title="PreAP HowTo - Working from Home";
include 'header.php';
?>
<p><strong>To work from home, you will need the following</strong></p>
<ul>
  <li>Some type of word processing software. Wordpad comes with Windows and is fine for most classroom needs.</li>
  <li>Visual Basic -- Microsoft has made Visual Basic available for trial use (one year trial) for free. It can be found at <a href="http://msdn.microsoft.com/vstudio/express/vb/">http://msdn.microsoft.com/vstudio/express/vb/</a></li>
  <li>Code Rules -- it is located in the shared drive and will install on your computer. Attach it to an email and send it to an address that you can access from home. Any files will download from that software. </li>
</ul>
<?php
ini_set('include_path', '/home/kweavus/public_html/class');
include 'footer.php';
?>