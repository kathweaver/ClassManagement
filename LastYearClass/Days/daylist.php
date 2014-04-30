<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
// Make database connection.
include 'db.php';
$page_title="List Days";
include 'header.php';
include 'loadlist.php';
  
$s = $HTTP_GET_VARS["sort"];     

if(!isset($_GET['page'])){ 
    $page = 1; 
} else { 
    $page = $_GET['page']; 
} 

?>
<script language="javascript"> 
function confirmdelete(delurl) { 
    var msg = "Are you sure you want to Delete this Row?"; 
    if (confirm(msg)) 
        location.replace(delurl);     
} 
</script> 
</head> 
<?php 
 
     
// Main Script     
    $addUrl = "daydetail.php?mode=add";
    if (isset($s)) 
        $addUrl .= "&sort=$s"; 
    echo "<a href=http://www.kweaver.net/class/main.php>Back</a>&nbsp;&nbsp;<a href=$addUrl>Add New Day</a>";     
	echo "<br>Six Weeks: <a href='daylist.php?page=1'>1</a> <a href='daylist.php?page=2'>2</a> <a href='daylist.php?page=3'>3</a>  <a href='daylist.php?page=4'>4</a>  <a href='daylist.php?page=5'>5</a>  <a href='daylist.php?page=6'>6</a>";
    loadlist($page); 
	echo "<Six Weeks: <a href='daylist.php?page=1'>1</a> <a href='daylist.php?page=2'>2</a> <a href='daylist.php?page=3'>3</a>  <a href='daylist.php?page=4'>4</a>  <a href='daylist.php?page=5'>5</a>  <a href='daylist.php?page=6'>6</a>";
	
include 'footer.php';
?> 