<?php 

$name = htmlspecialchars($_POST['name']);
$time = htmlspecialchars($_POST['datetime']);
$current_date = new DateTime();
$time = $current_date->format('Y-m-d ') . $time;

$time_in = new DateTime($time);

$time_in_str = $time_in->format("Y-m-d H:i:s");

$server_time_in = date("Y-m-d H:i:s");

$name_array = explode(',', $name);

//echo count($name_array);

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'ec2inmybutt';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

if (!$conn) {
	die('Could not connect: ' . mysqli_error($conn));
}

$name = mysqli_real_escape_string($conn, $name);

$time = mysqli_real_escape_string($conn, $time);

//$sql = "";

//echo $sql;

mysqli_select_db($conn, 'signoutdb');

for ($i = 0; $i < count($name_array); $i++) {
	$current_name = $name_array[$i];
	$sql_name_check = "SELECT * FROM Students WHERE Name = '{$current_name}' AND TimeIn IS NULL;";
	$name_check = mysqli_query($conn, $sql_name_check);
	if (mysqli_num_rows($name_check) == 0) {
		echo '-1' . ',';
		continue;
	}
	$sql = "UPDATE Students SET TimeIn='{$time_in_str}', ServerTimeIn='{$server_time_in}' WHERE name='{$current_name}';";
	$retval = mysqli_query($conn, $sql);

	if(! $retval ) {
	  die('Could not enter data: ' . mysqli_error($conn));
	}
	//echo $current_name . ','; //"\r\n"; 
	echo '1' . ',';
}

mysqli_close($conn);

//echo "{$name} has just been signed out to {$dest}"; 

?>