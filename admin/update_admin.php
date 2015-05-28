<?php 

$name = htmlspecialchars($_POST['name']);
$dest = htmlspecialchars($_POST['destination']);
$time_out = htmlspecialchars($_POST['time_out']);
$time_in = htmlspecialchars($_POST['time_in']);

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'ec2inmybutt';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if (!conn) {
	die('Could not connect: ' . mysql_error());
}

mysql_select_db('signoutdb');

$sql = "UPDATE Students SET Location='{$dest}', ";

if ($time_out) {
	if ($time_in) {
		$sql .= "TimeIn='{$time_in}', TimeOut='{$time_out}' WHERE name='{$name}';";
	}
	$sql .= "TimeOut='{$time_out}' WHERE name='{$name}';";
}
else if ($time_in) {
	$sql .= "TimeIn='{$time_in}' WHERE name='{$name}';";
}

$retval = mysql_query($sql, $conn);

echo $sql; 

if(! $retval ) {
	die('Could not enter data: ' . mysql_error());
}

mysql_close($conn);

?>