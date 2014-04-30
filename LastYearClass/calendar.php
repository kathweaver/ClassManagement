<html> 
<head> 
<title>PHP Calendar</title> 
<style type="text/css"> 
<!-- 
.table.calendar {border: 1px solid #000000; border-collapse: collapse; color: #000000; background: #FFFFFF; } 
.td.today { border: 1px solid white; color: #000000; background: #EFEFEF; font-weight: bold;} 
.td.monthdays {border: 1px solid #434470; color: #000000; background: #FFFFFFF; } 
.td.nonmonthdays { border: 1px solid white; color: #000000; background: #EFEFEF;} 
--> 
</style> 
<body> 

<?php 
error_reporting('0'); 
ini_set('display_errors', '0'); 
// Gather variables from 
// user input and break them 
// down for usage in our script 

if(!isset($_REQUEST['date'])){ 
   $date = mktime(0,0,0,date('m'), date('d'), date('Y')); 
} else { 
   $date = $_REQUEST['date']; 
} 

$day = date('d', $date); 
$month = date('m', $date); 
$year = date('Y', $date); 

// Get the first day of the month 
$month_start = mktime(0,0,0,$month, 1, $year); 

// Get friendly month name 
$month_name = date('M', $month_start); 

// Figure out which day of the week 
// the month starts on. 
$month_start_day = date('D', $month_start); 

switch($month_start_day){ 
    case "Sun": $offset = 0; break; 
    case "Mon": $offset = 1; break; 
    case "Tue": $offset = 2; break; 
    case "Wed": $offset = 3; break; 
    case "Thu": $offset = 4; break; 
    case "Fri": $offset = 5; break; 
    case "Sat": $offset = 6; break; 
} 

// determine how many days are in the last month. 
if($month == 1){ 
   $num_days_last = cal_days_in_month(0, 12, ($year -1)); 
} else { 
   $num_days_last = cal_days_in_month(0, ($month -1), $year); 
} 
// determine how many days are in the current month. 
$num_days_current = cal_days_in_month(0, $month, $year); 

// Build an array for the current days 
// in the month 
for($i = 1; $i <= $num_days_current; $i++){ 
    $num_days_array[] = $i; 
} 

// Build an array for the number of days 
// in last month 
for($i = 1; $i <= $num_days_last; $i++){ 
    $num_days_last_array[] = $i; 
} 

// If the $offset from the starting day of the 
// week happens to be Sunday, $offset would be 0, 
// so don't need an offset correction. 

if($offset > 0){ 
    $offset_correction = array_slice($num_days_last_array, -$offset, $offset); 
    $new_count = array_merge($offset_correction, $num_days_array); 
    $offset_count = count($offset_correction); 
} 

// The else statement is to prevent building the $offset array. 
else { 
    $offset_count = 0; 
    $new_count = $num_days_array; 
} 

// count how many days we have with the two 
// previous arrays merged together 
$current_num = count($new_count); 

// Since we will have 5 HTML table rows (TR) 
// with 7 table data entries (TD) 
// we need to fill in 35 TDs 
// so, we will have to figure out 
// how many days to appened to the end 
// of the final array to make it 35 days. 


if($current_num > 35){ 
   $num_weeks = 6; 
   $outset = (42 - $current_num); 
} elseif($current_num < 35){ 
   $num_weeks = 5; 
   $outset = (35 - $current_num); 
} 
if($current_num == 35){ 
   $num_weeks = 5; 
   $outset = 0; 
} 
// Outset Correction 
for($i = 1; $i <= $outset; $i++){ 
   $new_count[] = $i; 
} 

// Now let's "chunk" the $all_days array 
// into weeks. Each week has 7 days 
// so we will array_chunk it into 7 days. 
$weeks = array_chunk($new_count, 7); 


// Build Previous and Next Links 
$previous_link = "<a href=\"".$_SERVER['PHP_SELF']."?date="; 
if($month == 1){ 
   $previous_link .= mktime(0,0,0,12,$day,($year -1)); 
} else { 
   $previous_link .= mktime(0,0,0,($month -1),$day,$year); 
} 
$previous_link .= "\"><< Prev</a>"; 

$next_link = "<a href=\"".$_SERVER['PHP_SELF']."?date="; 
if($month == 12){ 
   $next_link .= mktime(0,0,0,1,$day,($year + 1)); 
} else { 
   $next_link .= mktime(0,0,0,($month +1),$day,$year); 
} 
$next_link .= "\">Next >></a>"; 

// Build the heading portion of the calendar table 
echo "<table border=\"1\" cellpadding=\"2\" cellspacing=\"0\" width=\"300\" class=\"calendar\">\n". 
     "<tr>\n". 
     "<td colspan=\"7\">". 
     "<table align=\"center\">". 
     "<tr>". 
     "<td colspan=\"2\" width=\"75\" align=\"left\">$previous_link</td>\n". 
     "<td colspan=\"3\" width=\"150\" align=\"center\">$month_name $year</td>\n". 
     "<td colspan=\"2\" width=\"75\" align=\"right\">$next_link</td>\n". 
     "</tr>\n". 
     "</table>\n". 
     "</td>\n". 
     "<tr>\n". 
     "<td>S</td><td>M</td><td>T</td><td>W</td><td>T</td><td>F</td><td>S</td>\n". 
     "</tr>\n"; 

// Now we break each key of the array 
// into a week and create a new table row for each 
// week with the days of that week in the table data 

$i = 0; 
foreach($weeks AS $week){ 
       echo "<tr>\n"; 
       foreach($week as $d){ 
         if($i < $offset_count){ 
             $day_link = "<a href=\"".$_SERVER['PHP_SELF']."?date=".mktime(0,0,0,$month -1,$d,$year)."\">$d</a>"; 
             echo "<td class=\"nonmonthdays\">$day_link</td>\n"; 
         } 
         if(($i >= $offset_count) && ($i < ($num_weeks * 7) - $outset)){ 
            $day_link = "<a href=\"".$_SERVER['PHP_SELF']."?date=".mktime(0,0,0,$month,$d,$year)."\">$d</a>"; 
           if($date == mktime(0,0,0,$month,$d,$year)){ 
               echo "<td class=\"today\">$d</td>\n"; 
           } else { 
               echo "<td class=\"days\">$day_link</td>\n"; 
           } 
        } elseif(($outset > 0)) { 
            if(($i >= ($num_weeks * 7) - $outset)){ 
               $day_link = "<a href=\"".$_SERVER['PHP_SELF']."?date=".mktime(0,0,0,$month +1,$d,$year)."\">$d</a>"; 
               echo "<td class=\"nonmonthdays\">$day_link</td>\n"; 
           } 
        } 
        $i++; 
      } 
      echo "</tr>\n";    
} 

// Close out your table and that's it! 
echo '<tr><td colspan="7" class="days">&nbsp;</td></tr>'; 
echo '</table>'; 
?> 
</body> 
</html> 