<? 
		$date = $_REQUEST['date'];
		echo "Test1";
		echo "<BR>";
		echo $date;
		echo "<BR>";
				
		$day = date('d', $date); 
		$month = date('m', $date); 
		$year = date('Y', $date); 

		echo "Month: ".$month;		
		echo "<BR>";
		echo "Day: ".$day;
		echo "<BR>";
		echo "Year: ".$year;
		
		echo "<BR>";
?> 