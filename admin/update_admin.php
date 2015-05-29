<?php 

$name = htmlspecialchars($_POST['name']);
$name_new = htmlspecialchars($_POST['name_new']);
$dest = htmlspecialchars($_POST['destination']);
$time_out = htmlspecialchars($_POST['time_out']);
$time_in = htmlspecialchars($_POST['time_in']);

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'ec2inmybutt';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

$name = mysqli_real_escape_string($conn, $name);
$name_new = mysqli_real_escape_string($conn, $name_new);
$dest = mysqli_real_escape_string($conn, $dest);
$time_out = mysqli_real_escape_string($conn, $time_out);
$time_in = mysqli_real_escape_string($conn, $time_in);


if (!$conn) {
	die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($conn, 'signoutdb');

$sql = "UPDATE Students SET Location='{$dest}', Name='{$name_new}', ";

if ($time_out) {
	if ($time_in) {
		$sql .= "TimeIn='{$time_in}', TimeOut='{$time_out}'";
	}
	$sql .= "TimeOut='{$time_out}'";
}
else if ($time_in) {
	$sql .= "TimeIn='{$time_in}'";
}

$sql .= " WHERE Name='{$name}';";

$retval = mysqli_query($conn, $sql);

//echo $sql; 

if(! $retval ) {
	die('Could not enter data: ' . mysqli_error($conn));
}

mysqli_close($conn);

?>