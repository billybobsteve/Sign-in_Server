<?php 

$option = htmlspecialchars($_POST['list']);

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'ec2inmybutt';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if (!$conn) {
	die('Could not connect: ' . mysql_error());
}

mysql_select_db('signoutdb');

switch ($option) {
	case "out_students" :
		//echo "out_students";
		$sql = 'SELECT * FROM Students WHERE TimeIn IS NULL;';
		//echo "all_students";
		$retval = mysql_query($sql, $conn);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysql_error());
		}
		$fields_num = mysql_num_fields($retval);
		//echo "<h1>Students</h1>";
		echo "<ul> <li>Id: <input class='text-box' id='id' type='text'> </li>";
		echo "<li>Name: <input class='text-box' id='name' type='text'> </li>";
		echo "<li>Location: <input class='text-box' id='dest' type='text'></li>";
		echo "<li>Time Out: <input class='text-box' id='time_out' type='text'></li>";
		echo "<li>Server Time Out: <input class='text-box' id='server_time_out' type='text'></li>";
		echo "<li>Time In: <input class='text-box' id='time_in' type='text'></li>";
		echo "<li>Server Time In: <input class='text-box' id='server_time_in' type='text'> </li></ul>";
		echo "<table border='0'>";
		echo "<tr> <th>Id</th> <th>Name</th> <th>Location</th> <th>Time Out</th> <th>Server Time Out</th> <th>Time In</th> <th>Server Time In</th></tr>";
		// printing table rows
		while($row = mysql_fetch_assoc($retval))
		{
		    echo "<tr>";
		    // $row is array... foreach( .. ) puts every element
		    // of $row to $cell variable
		    foreach($row as $key => $cell){
		        echo "<td> $cell </td>";
		    }
		    echo "</tr>\n";
		}
		echo '</table>';
		break;
	case "all_students" :
		//echo "all_students";
		$sql = 'SELECT * FROM Students';
		$retval = mysql_query($sql, $conn);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysql_error());
		}
		$fields_num = mysql_num_fields($retval);
		//echo "<h1>Students</h1>";
		echo "<table border='1'>";
		echo "<tr> <th>Id</th> <th>Name</th> <th>Location</th> <th>Time Out</th> <th>Server Time Out</th> <th>Time In</th> <th>Server Time In</th></tr>";
		// printing table rows
		while($row = mysql_fetch_assoc($retval))
		{
		    echo "<tr>";
		    // $row is array... foreach( .. ) puts every element
		    // of $row to $cell variable
		    foreach($row as $key => $cell){
		        echo "<td> $cell </td>";
		    }
		    echo "</tr>\n";
		}
		echo '</table>';
		break;
	case "edit_student" :
		//TODO
		break;
	case "clear_db" :
		$sql = "TRUNCATE TABLE Students;";
		$retval = mysql_query($sql, $conn);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysql_error());
		}
		echo "Database has been cleared";
		break;
	case "print_students":
		$sql = 'SELECT * FROM Students';
		$retval = mysql_query($sql, $conn);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysql_error());
		}
		$myfile = fopen("database.txt", "w") or die('Cannot open file: database.txt');
		while($row = mysql_fetch_assoc($retval)) {
			$text = "Student name: {$row['Name']} \n";
			fwrite($myfile, $text);
			$text = "Location: {$row['Location']} \n";
			fwrite($myfile, $text);
			$text = "Time out: {$row['TimeOut']} \n";
			fwrite($myfile, $text);
			$text = "Time in: {$row['TimeIn']} \n \n";
			fwrite($myfile, $text);
		}
		fclose($myfile);
		echo "Database has been printed in database.txt";
		break;
		
}


mysql_close($conn);

?>