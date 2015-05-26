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
		<div class="tab-box"> 
			<a href="javascript:;" class="tabLink activeLink" id="cont-1">Sign Out</a>
			<a href="javascript:;" class="tabLink " id="cont-2">Sign In</a>
		</div>
		<div id="sign-out-tab">
			<div id = "overlay"> </div>
			<div id = "confirmation"> </div>
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
	 			<!--
					<div id = "signOutInstruct">
						<p> To sign in: </p>
						<ol>
							<li> Enter your full name. </li>
							<li> Enter the current time. </li>
							<li> Press the submit button. </li>
						</ol>
					</div>
				-->
				</div>
			</p>

			<form id = "sign_out_form" name = "sign_out_form" action="action_out.php" method="post">

				<div id = "dataInput">
					<div class = "form_text">
						<label for = "name">Full Name: </label> <span> <input type="text" name = "name" id="name"/>
						<a id="plus" href="#"> <strong> + </strong> </a> </span>
					</div>
					<div class = "form_text">
						<label for = "destination">Destination: </label> <input type="text" name = "destination" id = "destination" class = "in"/>
					</div>
					<div class = "form_text">
						<label for = "time">Time Out: </label><input type="text" class = "in" id="time"/>
						<span id="downbutton">&#x25bc;</span>
						<span id="upbutton">&#x25b2;</span>
					</div>
				</div>
				
			</form>
			<div id = "groupList">
				<p>
					<div>
						<span> Previously entered names: </span>
						<ol id="nameList">
							
						</ol>
					</div>
				</p>
			</div>
			<form>
				<input type="button" value = "Submit" id="button" onclick = "post();"/>
			</form>
		</div>
		<div id="sign-in-tab">
		</div>
	</body>
	
	<script src="jquery-2.1.4.min.js"> </script>
	<script src="globalize.min.js"> </script>
	<script src="jquery-ui.min.js"> </script>
	<script src="script-front.js"> </script>
	<script src="async_post.js"> </script>
	<script src="script-front-tomerge.js"> </script>

</html>