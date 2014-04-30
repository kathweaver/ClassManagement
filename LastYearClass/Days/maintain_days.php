<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
// Make database connection.
include 'db.php';
$page_title="Maintain Days";
include 'header.php';
$user_level = $_SESSION['session_user_level'];

$numresults=mysql_query("SELECT * FROM Day"); 
$numrows=mysql_num_rows($numresults) 
		or die ("query 1 failed"); 

if (empty($offset)) { 
$offset=0; 
} 

$limit=15; // change to number of items displayed per page 

if ($user_level == '4') {	
    $sqlstring = 'select * from Day ORDER BY SixWeeks, Day, Date LIMIT '.$offset.' ,'.$limit;
	$sql = $sqlstring;
	$result = mysql_query($sql);

	print '<h2>Day Administration</h2>';
	print '<table border=1 cellpadding=0>';
	print '<tr><th>Change</th><th>Six_Weeks</th><th>Day</th><th>Date</th><th>Delete</th></tr>';

	while ($day = mysql_fetch_array($result)) {
	  
	  print '<tr><td>';
	  print '[<a href="modify_days.php?SixWeeks='.$day['Six_Weeks'].'&Day='.$day['Day'].'">'.Modify.'</a>]';
	  print '</td><td>';
	  print $day['Six_Weeks'];
	  print '</td><td>';
	  print $day['Day'];
	  print '</td><td>';
	  print $day['Date'];
	  print '</td><td>';
	  print '[<a href="delete_day.php?SixWeeks='.$day['Six_Weeks'].'&Day='.$day['Day'].'">'.Delete.'</a>]';
	  print '</td></tr>';
	  }
	print '</table>';

	if ($offset >= 3) { 
		$prevoffset = $offset - $limit; 
		print "<a href='$PHP_SELF?offset=$prevoffset'>PREV</a>&nbsp;"; 
		} 

	$pages=intval($numrows/$limit); 
	if ($pages < ($numrows/$limit)){ 
		$pages=($pages + 1); 
	} 
	for ($i = 1; $i <= $pages; $i++) { 
		$newoffset = $limit*($i-1); 
		if ($newoffset == $offset) { 
			print "$i&nbsp;"; 
		} else { 
			print "<a href='$PHP_SELF?offset=$newoffset'>$i</a>&nbsp;"; 
		} 
	} 

//show next if not last 
if (! ( ($offset/$limit) == ($pages - 1) ) && ($pages != 1) ) { 
	$newoffset = $offset+$limit; 
	print "<a href='$PHP_SELF?offset=$newoffset'>NEXT</a><p>"; 
	} 
	
}
include 'footer.php';
?>