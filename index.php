<!doctype = html>
<html>
	<head>
		<title>RCDS Senior Sign-in/Sign-out Sheet</title>
		<link type = "text/css" rel = "stylesheet" href = "frontsheet.css">
		<link href="jquery-ui.min.css" type="text/css">
		<link href="jquery-ui.structure.min.css" type="text/css">
		<link href="jquery-ui.theme.min.css" type="text/css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
	</head>

	<body>
		<div class="tab-box"> 
			<a href="#" class="tabLink activeLink" id="out-tab">Sign Out</a>
			<a href="#" class="tabLink" id="in-tab">Sign In</a>
		</div>
		<div id="sign-out-tab">
			<div id = "overlay"> <div id = "confirmation"> </div> </div>
			<h1 id="title">
				Sign Out of Campus
			</h1>
			<p>
				<div id = "instructions">
					<h3 style = "text-align: center"> Instructions: </h3>
					

					<div id="sign-out-instructions">
						<p> To sign out: </p>
						<ol>
							<li> Enter your full name. </li>
							<li> Enter where you will be going. </li>
							<li> Enter the current time, or time you are leaving. </li>
							<li> Press the submit button. </li>
						</ol>
					</div>
	 			
					<div id = "sign-in-instructions" class="hide">
						<p> To sign in: </p>
						<ol>
							<li> Enter your full name. </li>
							<li> Enter the current time. </li>
							<li> Press the submit button. </li>
						</ol>
					</div>
				
				</div>
			</p>


			<form id = "sign_out_form" name = "sign_out_form" action="action_out.php" method="post">

				<div id = "dataInput">
					<div class = "form_text">
						<label for = "name">Full Name: </label> <span> <input type="text" name = "name" id="name" class = "null" autocomplete = "off" autocorrect = "off"/> 
						<a id="plus" href="#"> <strong> + </strong> </a> </span>
					</div>
					
					<div class = "form_text" id="dest-div">
						<label for = "destination">Destination: </label> <input type="text" name = "destination" id = "destination" class = "in" autocomplete = "off" autocorrect = "off"/>
					</div>

					<div class = "form_text">
						<label for = "time" id="time-label">Time Out: </label>
						<input type="text" class = "in" id="time" autocomplete = "off" autocorrect = "off"/>
					</div>

					<div id="arrows_sections">
						<div id="second_arrows">
							<div id="upHRbutton" class="arrow">&#x25b2;</div>
							<div id="downHRbutton" class="arrow">&#x25bc;</div>
						</div>
						<span style = "font-size:36px"> : </span>
						<div id="third_arrows">
							<div id="upMINbutton" class="arrow">&#x25b2;</div>
							<div id="downMINbutton" class="arrow">&#x25bc;</div>
						</div>
					</div>
				</div>
			</form>

			<form>
				<input type="button" value = "Submit" id="button" onclick = "post();"/>
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
		</div>
		
		<div id="sign-in-tab">
		</div>

		<span id="credits" style="float:right; font-size:12px"> This sign-out system was made as a Senior Term Project by:
		 Chase Goddard, Thomas Ragucci, Nathan Spring, and Harrison Lee in 2015 </span>
	</body>
	
	
	<script src="jquery-2.1.4.min.js"> </script>

	<!--<script src="globalize.min.js"> </script>-->
	<script src="jquery-ui.min.js"> </script>
	<script src="typeahead.min.js"> </script>
	<script> var data = function() {return "<?php echo file_get_contents('class_list_full.csv'); ?>"; }; </script>

	
	<script> console.log(data); </script>
	<script src="script-front.js"> </script>
	<script src="async_post_index.js"> </script>
	<script src="typeahead_implementation.js"> </script>
	<!--<script src="script-front-tomerge.js"> </script> -->

</html>