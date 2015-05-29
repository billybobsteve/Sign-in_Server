<html>
	<head>
		<title>ADMIN</title>
		<link rel = "stylesheet" type = "text/css" href = "admin_style.css">
		<link rel = "stylesheet" type = "text/css" href = "../jquery-ui.min.css">
	</head>

	<body>
		<div id = "nicee">
		    <h3> Choose Action </h3>
		</div>
		<form id = "selection_form" name = "selection_form" action = "action_admin.php" method = "post">
			<select required id = "options"  name = "list">
				<option value = "table_students">All Students in Table </option>
				<option value = "out_students">Edit Out Students</option>
				<option value = "all_students">Edit All Students</option>
				<option value = "close_campus">Close Campus</option>
				<option value = "open_campus">Open Campus</option>
				<option value = "clear_db">Clear Database</option>
			</select>
			<div id = "other_info" class="hide">
			</div>
			<input type = "button" value = "Submit" id="submit" onclick="post();">

		</form>
		<div id="table">
		</div>
	</body>
	
	<script src="../jquery-2.1.4.min.js"> </script>
	<script src="async_post_admin.js"> </script>
	<script src="../jquery-ui.min.js"> </script>
	<script src="script-admin.js"></script> 	
</html>