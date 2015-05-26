<?php 
$name = htmlspecialchars($_POST['name']);
$dest = htmlspecialchars($_POST['destination']);
$time_out = date("Y-m-d H:i:s");

$name_array = explode(',', $name);

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'ec2inmybutt';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if (!conn) {
	die('Could not connect: ' . mysql_error());
}

$sql = "";

for ($i = 0; $i < count($name_array); $i++) {
	$current_name = $name_array[$i];
	$sql .= "INSERT INTO Students (Name, Location, TimeOut) VALUES ('{$current_name}', '{$dest}', '{$time_out}'); ";
}

echo $sql;

mysql_select_db('signoutdb');

$retval = mysql_query($sql, $conn);
if(! $retval ) {
  die('Could not enter data: ' . mysql_error());
}

mysql_close($conn);

//echo "{$name} has just been signed out to {$dest}"; 

?>
