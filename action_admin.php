<?php 

$option = htmlspecialchars($_POST['list']);
echo $option

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
		echo "out_students"
		$sql = 'SELECT * FROM Students WHERE TimeIn IS NULL';
		$retval = mysql_query($sql, $conn);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysql_error());
		}
		while($row = mysql_fetch_assoc($retval)) {
    		echo "Student name :{$row['Name']}  <br> ".
       	 	"Location : {$row['Location']} <br> ".
         	"Time out : {$row['TimeOut']} <br> ".
         	"--------------------------------<br>";
		} 
		break;
	case "all_students" :
		echo "all_students"
		$sql = 'SELECT * FROM Students';
		$retval = mysql_query($sql, $conn);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysql_error());
		}
		while($row = mysql_fetch_assoc($retval)) {
    		echo "Student name :{$row['Name']}  <br> ".
       	 	"Location : {$row['Location']} <br> ".
         	"Time out : {$row['TimeOut']} <br> ".
     		"Time in : {$row['TimeIn']} <br>"
         	"--------------------------------<br>";
		} 
		break;
	case "edit_student" :
		//TODO
		break;
}


mysql_close($conn);

?>