<?
session_start();
$page_title="Mrs. Weaver's ClassRoom Site";
include 'header.php';
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
include 'footer.php';
?>