<?php 
$name = htmlspecialchars($_POST['name']);
$dest = htmlspecialchars($_POST['destination']);
$time = htmlspecialchars($_POST['datetime']);
$current_date = new DateTime();
$time = $current_date->format('Y-m-d ') . $time;

$time_out = new DateTime($time);

$time_out_str = $time_out->format("Y-m-d H:i:s");

$server_time_out = date("Y-m-d H:i:s");
//
$name_array = explode(',', $name);

///////////////
$name_list = file_get_contents('class_list_full.csv');
//die(); //PHP
$legal_name_array = explode("\r", $name_list);

//echo $legal_name_array[1];

function x($var) {
	$new_var = explode(",", $var);
	//echo $new_var[0];
	return trim(strtolower($new_var[0])) . " " . trim(strtolower($new_var[1]));
}


$legal_name_array = array_map("x", $legal_name_array); 


//die();

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'ec2inmybutt';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if (!$conn) {
	die('Could not connect: ' . mysql_error());
}

mysql_select_db('signoutdb');


for ($i = 0; $i < count($name_array); $i++) {
	$current_name = $name_array[$i];
	$legal = false;
	for ($x = 0; $x < count($legal_name_array); $x++) {
		//echo $current_name;
		//echo $legal_name_array[$x];
		if ($current_name == $legal_name_array[$x]) {
			//echo "It worked!";
			$legal = true;
		}
	}
	if (!$legal) {
		echo "fuck you and your bullshit	";
		header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
		die();
	}

	$sql_name_check = "SELECT * FROM Students WHERE Name = '{$current_name}';";
	$name_check = mysql_query($sql_name_check, $conn);
	if (mysql_num_rows($name_check) > 0) {
		echo '-1' . ',';
		continue;
	}

	$sql = "INSERT INTO Students (Name, Location, TimeOut, ServerTimeOut) VALUES ('{$current_name}', '{$dest}', '{$time_out_str}', '{$server_time_out}');";
	$retval = mysql_query($sql, $conn);
	//echo $sql;

	if(! $retval ) {
		echo mysql_error();
	  	die('Could not enter data: ' . mysql_error());
	}
	//echo $current_name . ','; //"\r\n"; 
	echo '1' . ',';
}

mysql_close($conn);

//echo "{$name} has just been signed out to {$dest}"; 

?>
