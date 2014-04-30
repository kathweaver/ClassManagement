<?php

function session_checker(){ 
      if(!session_is_registered('session_first_name')){ 
 	      include '/home/kweavus/public_html/class/login.php'; 
          exit(); 
     } 
	$_SESSION['session_prevPage']=$_SESSION['session_page'];
	$_SESSION['session_page']=$_SERVER['PHP_SELF'];
//	echo "prevPage:".$_SESSION['session_prevPage'].'<br>';
//	echo "currPage:".$_SESSION['session_page'];
} 

function retrieve_session(){
	$session_first_name = $_SESSION['session_first_name'];
	$session_last_name = $_SESSION['session_last_name'];
	$session_StudentId = $_SESSION['session_StudentID'];
	$session_email_address = $_SESSION['session_email_address'];
	$session_user_level = $_SESSION['session_user_level'];
	$session_class = $_SESSION['session_class'];
	$session_period = $_SESSION['session_period'];
	$session_username = $_SESSION['session_username'];
	$session_userid = $_SESSION['session_userid'];
}
?>