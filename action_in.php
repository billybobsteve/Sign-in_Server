<?php 

$name = htmlspecialchars($_POST['name']);
$time_in = htmlspecialchars($_POST['datetime']);
$time_in = date("Y-m-d ") . $time_in;
$time_in = datetime::createfromformat('Y-m-d H:i:s',$time_in);
$server_time_in = date("Y-m-d H:i:s");

$name_array = explode(',', $name);

//echo count($name_array);

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'ec2inmybutt';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if (!conn) {
	die('Could not connect: ' . mysql_error());
}

//$sql = "";

//echo $sql;

mysql_select_db('signoutdb');

for ($i = 0; $i < count($name_array); $i++) {
	$current_name = $name_array[$i];
	$sql_name_check = "SELECT * FROM Students WHERE Name = '{$current_name}';";
	$name_check = mysql_query($sql_name_check, $conn);
	if (mysql_num_rows($name_check) == 0) {
		echo '-1' . ',';
		continue;
	}
	$sql = "UPDATE Students SET TimeIn='{$time_in}', ServerTimeIn='{$server_time_in}' WHERE name='{$current_name}';";
	$retval = mysql_query($sql, $conn);

	if(! $retval ) {
	  die('Could not enter data: ' . mysql_error());
	}
	//echo $current_name . ','; //"\r\n"; 
	echo '1' . ',';
}

mysql_close($conn);

//echo "{$name} has just been signed out to {$dest}"; 

?>