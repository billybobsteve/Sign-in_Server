<!doctype = html>
<html>
	<head>
		<title>RCDS Senior Sign-in/Sign-out Sheet</title>
		<link type = "text/css" rel = "stylesheet" href = "frontsheet.css">
		<link href="jquery-ui.min.css" type="text/css">
		<link href="jquery-ui.structure.min.css" type="text/css">
		<link href="jquery-ui.theme.min.css" type="text/css">
		<link rel="stylesheet" href="handheld.css" type="text/css" media="handheld, only screen and (max-device-width: 480px)"/>
		<link href="style.css" type="text/css">
		<meta name="viewport" content="width=device-width"/>

	</head>

	<body>
		<div class="tab-box"> 
			<a href="#" class="tabLink activeLink" id="out-tab">Sign Out</a>
			<a href="#" class="tabLink" id="in-tab">Sign In</a>
		</div>
		<div id="sign-out-tab">
			<div id = "overlay"> </div>
			<div id = "confirmation"> </div>
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
						<label for = "name">Full Name: </label> <span> <input type="text" name = "name" id="name" class = "typeahead" autocomplete = "off"/>
						<a id="plus" href="#"> <strong> + </strong> </a> </span>
					</div>
					
					<div class = "form_text" id="dest-div">
						<label for = "destination">Destination: </label> <input type="text" name = "destination" id = "destination" class = "in" autocomplete = "off"/>
					</div>

					<div class = "form_text">
						<label for = "time" id="time-label">Time Out: </label>
						<input type="text" class = "in" id="time" autocomplete = "off"/>
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
	</body>
	
	
	<script src="jquery-2.1.4.min.js"> </script>

	<!--<script src="globalize.min.js"> </script>-->
	<script src="jquery-ui.min.js"> </script>
	<script src = "typeahead.js"> </script>
	<script src="script-front.js"> </script>
	<script src="async_post_index.js"> </script>
	<script type="text/javascript">
		var substringMatcher = function(strs) {
	  	return function findMatches(q, cb) {
		    var matches, substringRegex;
		 
		    // an array that will be populated with substring matches
		    matches = [];
		 
		    // regex used to determine if a string contains the substring `q`
		    substrRegex = new RegExp(q, 'i');
		 
		    // iterate through the pool of strings and for any string that
		    // contains the substring `q`, add it to the `matches` array
		    $.each(strs, function(i, str) {
		      if (substrRegex.test(str)) {
		        matches.push(str);
		      }
		    });
		 
		    cb(matches);
  		};
	};
	 
	var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
	  'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
	  'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
	  'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
	  'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
	  'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
	  'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
	  'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
	  'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
	];
	 
	$('.typeahead').focus().typeahead({
		minLength: 1
	}
		,
	{
	  name: 'states',
	  source: substringMatcher(states)
	});

	</script>
	<!--<script src="script-front-tomerge.js"> </script> -->

</html>