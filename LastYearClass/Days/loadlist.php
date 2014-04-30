<?php 
    function loadlist($page) { 
         
        $q1 = "SELECT * FROM `Day` WHERE `SixWeeks`=$page ORDER BY Day"; 
		$rslt1 = mysql_query($q1) or die("Query failed"); 
     
        echo "<table><tr><th colspan=4>Day List</th></tr>"; 
        echo "<tr></th><th>Six Weeks</th><th>Day</th><th>Date</th></tr>\n"; 
           while ($row1 = mysql_fetch_array($rslt1, MYSQL_ASSOC)) { 
               echo "\t<tr>\n"; 
            $dtlUrl = "daydetail.php?mode=edit&seq=".$row1['seq']; 
            $delUrl = "daypost.php?mode=delete&delseq=".$row1['seq']; 
			$SixWeeks = $row1['SixWeeks'];
			echo "\t\t<td>".$row1['SixWeeks']."</a></td>";
			$day = $row1['Day'];
			echo "\t\t<td>".$row1['Day']."</a></td>";
			$date = $row1['Date'];
			echo "\t\t<td><a href=$dtlUrl>".$row1['Date']."</a></td>"; 
            echo "<td><input type=\"button\" value=\"Delete\" onClick=\"confirmdelete('".$delUrl."');\"></td>\t</tr>\n"; 
        } 
        echo "</table>\n"; 
        /* Free resultset */ 
    } 
?>