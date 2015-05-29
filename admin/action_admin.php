<?php 

$option = htmlspecialchars($_POST['list']);

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'ec2inmybutt';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);

$option = mysqli_real_escape_string($conn, $option);

if (!$conn) {
	die('Could not connect: ' . mysqli_error($conn));
}

mysqli_select_db($conn, 'signoutdb');
switch ($option) {
	case "table_students" :
		$sql = 'SELECT * FROM Students WHERE Id > 1;'; #WHERE TimeIn IS NULL;';
		$retval = mysqli_query($conn, $sql);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysqli_error($conn));
		}
		$fields_num = mysqli_num_fields($retval);
		//echo "<h1>Students</h1>";
		//$table = ""
		$table = "<div id = 'tablediv' style='display:inline-flex;'>";
		$table .= "<table border='1'>";
		$table .= "<tr> <th>Id</th> <th>Name</th> <th>Location</th> <th>User Specified Time Out</th> <th>Recorded Time Out</th> <th>User Specified Time In</th> <th>Recorded Time In</th></tr>";
		// printing table rows
		while($row = mysqli_fetch_assoc($retval)) {
		    $table .= "<tr>";
		    // $row is array... foreach( .. ) puts every element
		    // of $row to $cell variable
		    foreach($row as $key => $cell){
		        $table .= "<td> $cell </td>";
		    }
		    $table .= "</tr>\n";
		}
		$table .= '</table> </div>';
		$current_date = new DateTime();
		$table = str_replace($current_date->format('Y-m-d'), "", $table);
		echo $table;
		break;
	case "out_students" :
		//echo "out_students";
		$sql = 'SELECT * FROM Students WHERE TimeIn IS NULL AND Id > 1;';
		$retval = mysqli_query($conn, $sql);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysqli_error($conn));
		}
		echo "<div id = 'info'>";
		while($row = mysqli_fetch_assoc($retval)) {
    		echo "<div class='table-entry'> <ul> <li>Student name: <span>{$row['Name']}</span></li> ".
       	 	"<li> Location: <span>{$row['Location']}</span>  </li>".
         	"<li> Time out: <span>{$row['TimeOut']}</span> </li> </ul> </div> ";
		} 
		echo "</div>";
		break;
	case "all_students" :
		//echo "all_students";
		$sql = 'SELECT * FROM Students WHERE Id > 1';
		$retval = mysqli_query($conn, $sql);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysqli_error($conn));
		}
		echo "<div id = 'info'>";
		while($row = mysqli_fetch_assoc($retval)) {
    		echo "<div class='table-entry'> <ul> <li>Student name: <span>{$row['Name']}</span></li>  ".
       	 	"<li>Location: <span>{$row['Location']} </span> </li>".
         	"<li>Time out: <span>{$row['TimeOut']}</span>  </li>".
     		"<li>Time in: <span>{$row['TimeIn']} </span> </li> </ul> </div>";
		} 
		echo "</div>";
		break;
	case "close_campus":
		$sql = 'UPDATE Students SET Name="0" WHERE Id="1";';
		$retval = mysqli_query($conn, $sql);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysqli_error($conn));
		}
		echo "Campus has been closed: sign outs are no longer permitted."
		break;
	case "open_campus":
		$sql = 'UPDATE Students SET Name="1" WHERE Id="1";';
		$retval = mysqli_query($conn, $sql);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysqli_error($conn));
		}
		echo "Campus has been opened: sign outs are permitted."
		break;
	case "clear_db" :
		$sql = "DELETE * FROM Students WHERE Id > 1;";
		$retval = mysqli_query($conn, $sql);
		if(! $retval ) {
  			die('Could not retrieve data: ' . mysqli_error($conn));
		}
		echo "Database has been cleared";
		break;
		
}


mysqli_close($conn);

?>