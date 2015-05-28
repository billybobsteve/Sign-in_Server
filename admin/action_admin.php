<?php 

$option = htmlspecialchars($_POST['list']);

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'ec2inmybutt';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if (!conn) {
	die('Could not connect: ' . mysql_error());
}

mysql_select_db('signoutdb');

switch ($option) {
	case "out_students" :
		//echo "out_students";
		$sql = 'SELECT * FROM Students WHERE TimeIn IS NULL;';
		$retval = mysql_query($sql, $conn);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysql_error());
		}
		while($row = mysql_fetch_assoc($retval)) {
    		echo "<div class='table-entry'> <ul> <li>Student name: <span>{$row['Name']}</span></li> ".
       	 	"<li> Location: <span>{$row['Location']}</span>  </li>".
         	"<li> Time out: <span>{$row['TimeOut']}</span> </li> </ul> </div> ";
		} 
		break;
	case "all_students" :
		//echo "all_students";
		$sql = 'SELECT * FROM Students';
		$retval = mysql_query($sql, $conn);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysql_error());
		}
		while($row = mysql_fetch_assoc($retval)) {
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
		$retval = mysql_query($sql, $conn);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysql_error());
		}
		echo "Database has been cleared";
	case "print_students":
		$sql = 'SELECT * FROM Students';
		$retval = mysql_query($sql, $conn);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysql_error());
		}
		$file = fopen("home/ubuntu/Sign-in_Server/admin/database.txt", "w") or die('Cannot open file: database.txt');
		while($row = mysql_fetch_assoc($retval)) {
			$text = "Student name: {$row['Name']} \n";
			fwrite($file, $text);
			$text = "Location: {$row['Location']} \n";
			fwrite($file, $text);
			$text = "Time out: {$row['TimeOut']} \n";
			fwrite($file, $text);
			$text = "Time in: {$row['TimeIn']} \n";
			fwrite($file, $text);
		}
		fclose($file);
		break;
		
}


mysql_close($conn);

?>