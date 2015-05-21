<?php 
$name = htmlspecialchars($_POST['name']);
$dest = htmlspecialchars($_POST['destination']);
$time_out = date ("Y-m-d H:i:s", $phptime);
echo "{$name} has just been signed out to {$dest}"; 

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'ec2inmybutt';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if (!conn) {
	die('Could not connect: ' . mysql_error());
}

$sql = 'INSERT INTO Students (Name, Location, TimeOut) VALUES ({$name}, {$dest}, {$time_out})';

mysql_select_db('signoutdb');

$retval = mysql_query($sql, $conn);
if(! $retval ) {
  die('Could not enter data: ' . mysql_error());
}

mysql_close($conn);

?>
