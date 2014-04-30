<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
// Make database connection.
include 'db.php';
$page_title="List Users";
include 'header.php';
  
$s = $HTTP_GET_VARS["sort"];     
?>
<script language="javascript"> 
function confirmdelete(delurl) { 
    var msg = "Are you sure you want to Delete this User?"; 
    if (confirm(msg)) 
        location.replace(delurl);     
} 
</script> 
<?php 
    function loadlist($s) { 
         
        $sqlstring = "SELECT * FROM submissions sub, users user WHERE grade IS NOT NULL AND recorded is NULL AND sub.userid = user.userid" ORDER BY class;
        $rslt1 = mysql_query($q1) or die("Query failed"); 
     
        echo "<table><tr><th colspan=4>Users</th></tr>"; 
        echo "<tr><th><a href=".$_SERVER['SCRIPT_NAME'].">Level</a></th><th><a href=".$_SERVER['SCRIPT_NAME']."?sort=username>Username</a></th><th><a href=".$_SERVER['SCRIPT_NAME']."?sort=firstname>First Name</a><th><a href=".$_SERVER['SCRIPT_NAME']."?sort=lastname>Last Name</a></th><th><a href=".$_SERVER['SCRIPT_NAME']."?sort=class>Class</a></th><th><a href=".$_SERVER['SCRIPT_NAME']."?sort=period>Period</a></th><th>Email</th><th>Typing ID</th><th>Activated</th></tr>\n"; 
           while ($row1 = mysql_fetch_array($rslt1, MYSQL_ASSOC)) { 
               echo "\t<tr>\n"; 
            $dtlUrl = "userdetail.php?mode=edit&userid=".$row1['userid']; 
            $delUrl = "userpost.php?mode=delete&deluserid=".$row1['userid']; 
			$resetURL = "reset_password.php?userid=".$row1['userid'];
   		    if (isset($s)) { 
                $dtlUrl .= "&sort=$s"; 
                $delUrl .= "&sort=$s"; 
            } 
			echo "\t\t<td><a href=$dtlUrl>".$row1['user_level']."</a></td>";
			echo "\t\t<td><a href=$dtlUrl>".$row1['username']."</a></td>";
			echo "\t\t<td><a href=$dtlUrl>".$row1['first_name']."</a></td>";
			echo "\t\t<td><a href=$dtlUrl>".$row1['last_name']."</a></td>";
			echo "\t\t<td><a href=$dtlUrl>".$row1['class']."</a></td>";
			echo "\t\t<td><a href=$dtlUrl>".$row1['period']."</a></td>";
			echo "\t\t<td><a href=$dtlUrl>".$row1['email_address']."</a></td>";
			echo "\t\t<td><a href=$dtlURL>".$row1['TypingID']."</a></td>";
			echo "\t\t<td><a href=$dtlUrl>".$row1['activated']."</a></td>";
            echo "<td><input type=\"button\" value=\"Delete\" onClick=\"confirmdelete('".$delUrl."');\"></td>\t"; 
	        echo "<td><input type=\"button\" value=\"Reset\" onClick=\"confirmreset('".$resetURL."');\"></td>\t</tr>\n"; 
        } 
        echo "</table>\n"; 
        /* Free resultset */ 
    } 
     
// Main Script    
 
    $addUrl = "userdetail.php?mode=add"; 
    if (isset($s)) 
        $addUrl .= "&sort=$s"; 
    echo "<a href=http://www.kweaver.net/class/main.php>Back</a>&nbsp;&nbsp;<a href=$addUrl>Add New User</a>";     
    loadlist($s); 
	
include 'footer.php';
?> 