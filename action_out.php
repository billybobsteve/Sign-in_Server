<?php 
$name = htmlspecialchars($_POST['name']);
$dest = htmlspecialchars($_POST['destination']);
$time_out = date('Y-m-d H:i:s');
echo "{$name} has just been signed out to {$dest}"; 

$dbhost = "52.7.134.39:3036";
$dbhost = 'root';
$dbpass = 'ec2inmybutt';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if (!conn) {
	/*die('Could not connect: ' . mysql_error());*/
	echo ('Could not connect: ' . mysql_error());
}

$sql = 'INSERT INTO Students (Name, Location, TimeOut) VALUES ({$name}, {$dest}, {$time_out})';

mysql_select_db('signoutdb');

$retval = mysql_query($sql, $conn);
if(! $retval ) {
  /*die('Could not enter data: ' . mysql_error());*/
  echo ('Could not enter data: ' . mysql_error());
}

mysql_close($conn);

?>
