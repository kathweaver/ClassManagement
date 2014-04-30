<?php
session_start();
ini_set('include_path', '/home/kweavus/public_html/class');
include 'sessionchecker.php';
session_checker();
// Make database connection.
include 'db.php';

    $mode = $HTTP_GET_VARS["mode"]; 
    $delIndex = $HTTP_GET_VARS["delIndex"]; 

	$Index = $_POST['Index'];
	$Subject = $_POST['Subject'];         
	$SixWeeks = $_POST['SixWeeks'];
	$Day = $_POST['Day'];
	$Order = $_POST['DayOrder'];
	$DueDate = $_POST['DueDate'];
	$Assignment = $_POST['Assignment'];

/*   
    // For debugging 
    foreach($_POST as $key => $value) { 
        echo "$key: $value \n"; 
    } 
*/ 

    if (isset($mode) && ($mode == 'delete') && ($delIndex > 0)) { 
        $status = "Deleted"; 
        $q1 = "DELETE FROM Lessons WHERE `Index` = $delIndex"; 
		$rslt1 = mysql_query($q1) or die("Delete Query failed");  
    } elseif ($Index > 0) { 
        $status = "Saved"; 
		$q1 = "UPDATE Lessons SET `Subject`='$Subject',`SixWeeks`='$SixWeeks', `Day`='$Day', `DayOrder`='$DayOrder', `DueDate`='$DueDate', `Assignment`='$Assignment' WHERE `Index`=$Index";
		$rslt1 = mysql_query($q1) or die("Edit Query failed"); 
    } else { 
        if ($Index == 0) { 
            $status = "Added";         
            $q1 ="INSERT INTO Lessons (Subject, SixWeeks, Day, DayOrder, DueDate, Assignment)
				VALUES ('$Subject', '$SixWeeks', '$Day', '$Order', '$DueDate', '$Assignment')";
			$rslt1 = mysql_query($q1) or die("Add Query failed");             
			$Index = mysql_insert_id($connection); 
        } 
    } 
	
    if ($mode == 'delete') { 
        $returnurl = $_SESSION['session_prevPage'];
    } else { 
        $returnurl = "lessondetail.php?mode=edit&Index=".$Index."&status=".$status; 
    }     
    header("Location: $returnurl");  
?> 