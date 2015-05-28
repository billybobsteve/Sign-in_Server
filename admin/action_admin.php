<?php 

$option = htmlspecialchars($_POST['list']);
$name = htmlspecialchars($_POST['name']);
$dest = htmlspecialchars($_POST['destination']);
$time_out = htmlspecialchars($_POST['time_out']);
$time_in = htmlspecialchars($_POST['time_in']);
echo $option;
echo $name;
echo $dest;
echo $time_out;
echo $time_in;

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
		$sql = "UPDATE Students SET " . $time_out ? ("TimeIn='{$time_in}'" . $time_in ? "," : "") : "" . $time_in ? "TimeOut='{$TimeOut}'" : "" . "WHERE name='{$name}';";
		echo $sql;
		break;
}


mysql_close($conn);

?>