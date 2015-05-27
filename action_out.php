<?php 
$name = htmlspecialchars($_POST['name']);
$dest = htmlspecialchars($_POST['destination']);
$time_out = htmlspecialchars($_POST['datetime']);
$current_date = new DateTime();
$time_out = $current_date->format('Y-m-d ') . $time_out;
echo $time_out;
echo gettype($time_out);

$time_test = new DateTime($time_out);
//$time_out = datetime::createfromformat('Y-m-d H:i:s', $time_out);
echo $time_out;
die();

$server_time_out = date("Y-m-d H:i:s");
echo $time_out;

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
	if (mysql_num_rows($name_check) > 0) {
		echo '-1' . ',';
		continue;
	}
	$sql = "INSERT INTO Students (Name, Location, TimeOut, ServerTimeOut) VALUES ('{$current_name}', '{$dest}', '{$time_out}', '{$server_time_out}'); ";
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
