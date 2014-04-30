<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'db.php';
require_once("zip.lib.php");
require_once("deldir.php");
$filename = $_REQUEST['Filename'];
$username = $_REQUEST['Username'];
$directory = substr($filename, 0, -4);
//strip off everything in front of the period for $file
$arch="/home/kathweav/upload/".$username."/".$filename;
$file1="/home/kathweav/public_html/students/".$username."/".$directory;
$file2="/home/kathweav/public_html/students/".$username;
$href="http://students.kweaver.net/".$username."/".$directory;

if (is_dir($file1))
	deldir($file1);

$zip = new Zip;
$zip->Extract($arch,$file2,Array(-1));

echo 'See your webpage at <a href="'.$href.'">'.$href."</a>";
echo "<BR>";
echo "You will need the userid: student and password: panther";

?>