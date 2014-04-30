<? 
session_start();

if($_SESSION['session_user_level'] == 0){
	include 'guest.php';
}

if($_SESSION['session_user_level'] == 1){
	include 'guest.php';
}

if($_SESSION['session_user_level'] == 2){
	include 'parent.php';
}

if($_SESSION['session_user_level'] == 3){
	include 'student.php';
}

if($_SESSION['session_user_level'] == 4){
	include 'teacher.php';
}
?>