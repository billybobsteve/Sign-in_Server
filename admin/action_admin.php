<?php 

$option = htmlspecialchars($_POST['list']);

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'ec2inmybutt';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

$option = mysqli_real_escape_string($conn, $option);

if (!$conn) {
	die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($conn, 'signoutdb');

switch ($option) {
	case "table_students" :
		$retval = mysql_query($sql, $conn);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysql_error());
		}
		$fields_num = mysql_num_fields($retval);
		//echo "<h1>Students</h1>";
		echo "<div id = 'tablediv' style='display:inline-flex;'>";
		echo "<table border='1'>";
		echo "<tr> <th>Id</th> <th>Name</th> <th>Location</th> <th>Time Out</th> <th>Server Time Out</th> <th>Time In</th> <th>Server Time In</th></tr>";
		// printing table rows
		while($row = mysql_fetch_assoc($retval)) {
		    echo "<tr>";
		    // $row is array... foreach( .. ) puts every element
		    // of $row to $cell variable
		    foreach($row as $key => $cell){
		        echo "<td> $cell </td>";
		    }
		    echo "</tr>\n";
		}
		echo '</table> </div>';
		break;
	case "out_students" :
		//echo "out_students";
		$sql = 'SELECT * FROM Students WHERE TimeIn IS NULL;';
		$retval = mysqli_query($conn, $sql);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysqli_error($conn));
		}
		while($row = mysqli_fetch_assoc($retval)) {
    		echo "<div class='table-entry'> <ul> <li>Student name: <span>{$row['Name']}</span></li> ".
       	 	"<li> Location: <span>{$row['Location']}</span>  </li>".
         	"<li> Time out: <span>{$row['TimeOut']}</span> </li> </ul> </div> ";
		} 
		break;
	case "all_students" :
		//echo "all_students";
		$sql = 'SELECT * FROM Students';
		$retval = mysqli_query($conn, $sql);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysqli_error($conn));
		}
		while($row = mysqli_fetch_assoc($retval)) {
    		echo "<div class='table-entry'> <ul> <li>Student name: <span>{$row['Name']}</span></li>  ".
       	 	"<li>Location: <span>{$row['Location']} </span> </li>".
         	"<li>Time out: <span>{$row['TimeOut']}</span>  </li>".
     		"<li>Time in: <span>{$row['TimeIn']} </span> </li> </ul> </div>";
		} 
		break;
	case "edit_student" :
		//TODO
		break;
	case "clear_db" :
		$sql = "TRUNCATE TABLE Students;";
		$retval = mysqli_query($conn, $sql);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysqli_error($conn));
		}
		echo "Database has been cleared";
		break;
	case "print_students":
		$sql = 'SELECT * FROM Students';
		$retval = mysqli_query($conn, $sql);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysqli_error($conn));
		}
		$myfile = fopen("database.txt", "w") or die('Cannot open file: database.txt');
		while($row = mysqli_fetch_assoc($retval)) {
			$text = "Student name: {$row['Name']} \n";
			fwrite($myfile, $text);
			$text = "Location: {$row['Location']} \n";
			fwrite($myfile, $text);
			$text = "Time out: {$row['TimeOut']} \n";
			fwrite($myfile, $text);
			$text = "Time in: {$row['TimeIn']} \n \n";
			fwrite($myfile, $text);
		}
		fclose($myfile);
		echo "Database has been printed in database.txt";
		break;
		
}


mysqli_close($conn);

?>