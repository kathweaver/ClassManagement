<SCRIPT LANGUAGE=Javascript>
function CharCode(str, ch) {

	var space = " ";
	var chars = ",-.";
	var digit = "0123456789";
	var lower = "abcdefghijklmnopqrstuvwxyz";
	var upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

	code = space.indexOf(str.substr(ch, 1));
	if (code != -1) return code + 32;

	code = chars.indexOf(str.substr(ch, 1));
	if (code != -1) return code + 44;

	code = digit.indexOf(str.substr(ch, 1));
	if (code != -1) return code + 48;

	code = lower.indexOf(str.substr(ch, 1));
	if (code != -1) return code + 97;

	code = upper.indexOf(str.substr(ch, 1));
	if (code != -1) return code + 65;

	return -1;

	}

function ShowGrades() {

	var ch = 0, len = 0, pos = 0, code = 0, total1 = 0, total2 = 0;

	id  = document.authorization.password.value;
	len = id.length;

	if (len <= 2) id = id + id;
	if (len <= 4) id = id + id;
	if (len <= 6) id = id + id;

	pos = 15;
	len = id.length;

	for (ch = 0; ch <= len - 1; ch++) {

		code = CharCode(id, ch);

		if ((code == 32               ) ||
			(code >= 44 && code <=  46) ||
			(code >= 48 && code <=  57) ||
		    (code >= 65 && code <=  90) ||
		    (code >= 97 && code <= 122)) {

			pos    += 1;
			total1 += pos * (code - 31);

			}

		}

	name = document.authorization.username.value;
	len  = name.length;
	pos  = 31;

	for (ch = 0; ch <= len - 1; ch++) {

		code = CharCode(name, ch);

		if ((code == 32               ) ||
			(code >= 44 && code <=  46) ||
			(code >= 65 && code <=  90) ||
		    (code >= 97 && code <= 122)) {

			pos    += 1;
			total2 += pos * (code - 31);

			}

		}

	url = "http://www.kweaver.net/Grades/" + total1 * total2 + ".html";
	window.location = url;

	return false;

	}
</SCRIPT>
<? 
		echo "<ul>";
		echo "<li><a href='http://www.kweaver.net/class/HowTo/'>How To</a></li>";
	
		if ($_SESSION['session_class']=="APCSI"){
		echo "<li><a href='http://www.publicstaticvoidmain.org/jj2/SIJtoc.html'>Step Into Java</a></li>";
		echo "<li><a href='http://www.kweaver.net/class/readfile.php?path=/textbooks/BPJ_TextBook_1_08.pdf'>	Blue-Pelican Java</a></li>";
	}



	echo "</ul>";
	echo "<ul>";
	echo "<li><a href='http://www.kweaver.net/class/cal.php'>Daily Schedule</a></li>";
		echo "<li><a href='http://www.kweaver.net/class/Due/listdue.php'>Assignments to be Turned</a></li>";
		if ($_SESSION['session_class']=="Webmastering"){
		echo "<LI><B><a href='http://www.kweaver.net/class/submissions/UploadStudent.html'>Upload Website for Testing</a></B></LI>";
	}
	if ($_SESSION['session_class']=="Webmastering"){
		echo "<LI><B><a href='http://www.kweaver.net/class/submissions/studentUploadWebpage.html'>Upload Website and TurnIn</a></B></LI><P>";
	}
	echo "<li><strong><a href='http://www.kweaver.net/class/submissions/newupload_assignment.php'>Turn In Current Six Weeks Assignment</a></strong></li>";
	echo "<li><strong><a href='http://www.kweaver.net/class/submissions/new4thupload_assignment.php'>Turn In Assignment Made 4th Six Weeks</a></strong></li>";
	echo "<li><strong><a href='http://www.kweaver.net/class/submissions/new5thupload_assignment.php'>Turn In Assignment Made 5th Six Weeks</a></strong></li>";

	echo "<li><a href='http://www.kweaver.net/class/sixweeks.php'>Current Six Weeks Schedule</a></li>";
	echo "</UL>";
	echo "<UL>";
	echo "<P>";
	echo "<li><a href='http://www.kweaver.net/class/user/change_info.php'>Change Information</a></li>";
	echo "<li><a href='http://www.kweaver.net/class/user/change_psw.html'>Change Password</a></li>";
	echo '<FORM NAME=authorization onsubmit="return ShowGrades()">';
	$last_name = $_SESSION['session_last_name'];
	$first_name = $_SESSION['session_first_name'];
	$password = $_SESSION['session_StudentId'];
	$username = $last_name.', '.$first_name;
	echo '<INPUT TYPE=HIDDEN NAME=username SIZE=50 MAXLENGTH=50 VALUE="'.$username.'">';
	echo '<INPUT TYPE=HIDDEN NAME=password SIZE=40 MAXLENGTH=15 VALUE='.$password.'>';
	echo '<INPUT TYPE=submit NAME=grades VALUE="Show Grades">';
	
	echo "</FORM>";
	echo '<FORM NAME=grades onsubmit="return ShowGrades1()">';
	$last_name = $_SESSION['session_last_name'];
	$first_name = $_SESSION['session_first_name'];
	$password = $_SESSION['session_StudentId'];
	$username = $last_name.', '.$first_name;
	echo '<INPUT TYPE=HIDDEN NAME=username SIZE=50 MAXLENGTH=50 VALUE="'.$username.'">';
	echo '<INPUT TYPE=HIDDEN NAME=password SIZE=40 MAXLENGTH=15 VALUE='.$password.'>';
	echo '<INPUT TYPE=submit NAME=grades VALUE="Show Previous Six Weeks Grades">';

	
	echo "</FORM>";
	echo "</ul>";
	echo "<br>";
	include '/home/kweavus/public_html/class/submissions/list_user_assign.php';
?>