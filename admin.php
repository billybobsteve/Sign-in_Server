<html>
	<head>
		<title>ADMIN</title>
	</head>

	<body>

		<h3> Choose Action </h3>

		<form action = "admin.php" method = "post" name = "list">
		<select required id = "options">
			<option value = "out_students">Get Out Students</option>
			<option value = "all_students">Get All Students</option>
			<option value = "edit_student">Edit Student</option>  	
		</select>
		<div id = "other_info" style = "display: none;">
		<input type = "text" placeholder = "Enter Student Full Name">
		<input type = "text" placeholder = "Enter Student Location">
		<input type = "text" placeholder = "Enter Student Time in">
		<input type = "text" placeholder = "Enter Student Time Out">
	</div>
		<input type = "submit" value = "Submit">


	</form>

	</body>
	<link rel = "stylesheet" type = "text/css" href = "admin_style.css">
	<script src="jquery-2.1.4.min.js"/>
	<script src="script.js"/> 
</html>