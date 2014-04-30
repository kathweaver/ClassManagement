<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
$page_title="Find Lesson";
include 'header.php';
include 'db.php';

$user_level = $_SESSION['session_user_level'];

if ($user_level==4){
	echo "<head>";
	echo "</head>";
	echo ('<form name="form1" action="multilessons.php" method=POST>');
	echo ('Class:<select name="Class" size="1">
		  <option value="APCSI">APCSI</option>
  		  <option value="APCSII">APCSII</option>
          <option value="CSI">CSI</option>
          <option value="BCIS">BCIS</option>
          <option value="PreAP">PreAP</option>
          <option value="Webmastering">Webmastering</option>
        </select>');
	echo ('<p>');
	echo ('Six Weeks:<input name="six_weeks" type="text" id="six_weeks"  value=""');
	echo ('<p>');
	echo ('Day: <input name="day" type="text" id="day"  value=""');
	echo ('<br>');

	echo ('<input type="submit" name="Search" value="Search">');
	echo ("</form>");
}
else
	echo ("You are not allowed to search for a lesson");

include 'footer.php';
?>