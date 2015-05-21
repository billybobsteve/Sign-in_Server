<html>
	<head>
		<title>Sign out/in</title>
	</head>

	<body>
		<form action="action_out.php" method="post">
			<p>Full name: <input type="text" name = "name" /></p>
			<p>Destination: <input type="text" name = "destination" /></p>
			<p>Time Out: <input type=""
			<p><input type="submit" id="time"/></p>
		</form>

		<?php 
		echo '<p>Hello World</p>'; 
		?> 
	</body>
	<link href="style.css" type="text/css">
	<script src="timepicker.js"></script>
	<script src="script-front.js"></script>
	<script src="jquery-2.1.4.min.js"> </script>
</html>