<?php 

$option = htmlspecialchars($_POST['list']);

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'ec2inmybutt';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if (!$conn) {
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
    		echo $retval;
		} 
		break;
	case "all_students" :
		//echo "all_students";
		$sql = 'SELECT * FROM Students';
		$retval = mysql_query($sql, $conn);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysql_error());
		}
		echo mysql_fetch_array($retval)[0];
		//echo var_dump($retval);
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
		break;
	case "print_students":
		$sql = 'SELECT * FROM Students';
		$retval = mysql_query($sql, $conn);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysql_error());
		}
		$myfile = fopen("database.txt", "w") or die('Cannot open file: database.txt');
		while($row = mysql_fetch_assoc($retval)) {
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


mysql_close($conn);

?>