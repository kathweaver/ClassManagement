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
  <li>For written exercises:
    <ul>
      <li>Some type of word processing software. Wordpad comes with Windows and is fine for most classroom needs.</li>
    </ul>
  </li>
  <li>JCreator. You can find it at <a href="http://www.jcreator.com/download.htm">http://www.jcreator.com/download.htm </a>and chose   a JCreator LE version. These are free. </li>
  <li>The Java development kit. You will find it at <a href="http://java.sun.com/j2se/1.5.0/download.jsp">http://java.sun.com/j2se/1.5.0/download.jsp</a></li>
  <li>You can also download and use StarOffice. It is free for educational use. If you are turning in work, make sure you save your work in a Microsoft Office format. That software can be found at<a href="http://www.sun.com/products-n-solutions/edu/solutions/staroffice.html"> http://www.sun.com/products-n-solutions/edu/solutions/staroffice.html.  </a>You have to register and recreate a login to get the software. </li>
</ul>
<?php
ini_set('include_path', '/home/kweavus/public_html/class');
include 'footer.php';
?>