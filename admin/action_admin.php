<?php 

$option = htmlspecialchars($_POST['list']);
//echo $option;

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
		$sql = 'SELECT * FROM Students WHERE TimeIn IS NULL';
		$retval = mysql_query($sql, $conn);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysql_error());
		}
		while($row = mysql_fetch_assoc($retval)) {
    		echo "<div class='table-entry'> <ul> <li>Student name:{$row['Name']}</li> ".
       	 	"<li> Location: {$row['Location']}  </li>".
         	"<li> Time out: {$row['TimeOut']} </li> </ul> </div> ";
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
    		echo "<div class='table-entry'> <ul> <li>Student name :{$row['Name']}</li>  ".
       	 	"<li>Location: {$row['Location']}  </li>".
         	"<li>Time out: {$row['TimeOut']}  </li>".
     		"<li>Time in: {$row['TimeIn']}  </li> </ul> </div>";
		} 
		break;
	case "edit_student" :
		//TODO
		break;
}


mysql_close($conn);

?>