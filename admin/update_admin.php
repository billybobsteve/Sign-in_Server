<?php 

$name = htmlspecialchars($_POST['name']);
$dest = htmlspecialchars($_POST['destination']);
$time_out = htmlspecialchars($_POST['time_out']);
$time_in = htmlspecialchars($_POST['time_in']);
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

$sql = "UPDATE Students SET " . $time_out ? ("TimeIn='{$time_in}'" . $time_in ? "," : "") : "" . $time_in ? "TimeOut='{$TimeOut}'" : "" . "WHERE name='{$name}';";
echo $sql;


mysql_close($conn);

?>