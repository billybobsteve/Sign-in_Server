<!doctype = html>
<html>
	<head>
		<title>RCDS Senior Sign-in/Sign-out Sheet</title>
		<link type = "text/css" rel = "stylesheet" href = "frontsheet.css">
		<link href="jquery-ui.min.css" type="text/css">
		<link href="jquery-ui.structure.min.css" type="text/css">
		<link href="jquery-ui.theme.min.css" type="text/css">
		<link href="style.css" type="text/css">
	</head>

	<body>

		<h1>
			Sign In and Out of Campus
		</h1>

		<p>
			<div id = "instructions">
				<h3 style = "text-align: center"> Instructions: </h3>
				
				<div id = "signInInstruct">
					<p> To sign out: </p>
					<ol>
						<li> Enter your full name. </li>
						<li> Enter where you will be going. </li>
						<li> Enter the current time, or time you are leaving. </li>
						<li> Press the submit button. </li>
					</ol>
				</div>

				<div id = "signOutInstruct">
					<p> To sign in: </p>
					<ol>
						<li> Enter your full name. </li>
						<li> Enter the current time. </li>
						<li> Press the submit button. </li>
					</ol>
				</div>

			</div>
		</p>

		<form action="action_out.php" method="post">

			<div id = "dataInput">
				Full name: <span> <input type="text" name = "name"/><a href="#">+<a></span>
				Destination: <input type="text" name = "destination" class = "in"/>
				Time Out: <input type="text" class = "in" id="time"/>
				<p>
					<div id = "groupList">
						Previously entered names:

						<ol>
							<li>
							</li>
						</ol>
					</div>

					<input type="submit" id="button"/>
				</p>

			</div>
		</form>

	</body>


	
	<script src="jquery-2.1.4.min.js"> </script>
	<script src="globalize.min.js"> </script>
	<script src="jquery-ui.min.js"> </script>
	<script src="script-front.js"> </script>

</html>