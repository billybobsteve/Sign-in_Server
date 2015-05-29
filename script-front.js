$(document).ready(function(){
	//pad a time with 0's
	var pad = function(x){
		if(x<10){
			return "0"+x;
		}
		return x;
	};
	var now = new Date();
	var hours = now.getHours();
	var mins = now.getMinutes();
	var sec_since_midnight = hours*3600+mins*60; 
	var counter = 0;

	var repeat = function(){
		now = new Date();
		hours = now.getHours();
		mins = now.getMinutes();
		sec_since_midnight = hours*3600+mins*60;
		$("#time").val(format(sec_since_midnight));
	}

	//update time every 60s so that people don't sign in with the same time they sign out
	setInterval(repeat, 60000);

	//format # of seconds into a time
	var format = function (v) {
		v = Number(v);
		var h = Math.floor(v / 3600);
		v = v - h*3600;
		var m = pad(Math.floor(v / 60));
		var ampm = (h < 12) ? "AM" : "PM";
		if(h!==12){
			h %= 12;
		}
		h = pad(h);
		return h + ":" + m + " " + ampm;
	};

	$("#time").val(format(sec_since_midnight));

	//time arrow functionality
	$("#upHRbutton").click(function(){
		sec_since_midnight+=3600;
		if(sec_since_midnight > 86400){
			sec_since_midnight = 86400;
		}
		$("#time").val(format(sec_since_midnight));
	});

	$("#downHRbutton").click(function(){
		sec_since_midnight-=3600;
		if(sec_since_midnight < 0){
			sec_since_midnight = 0;
		}
		$("#time").val(format(sec_since_midnight));
	});

	$("#upMINbutton").click(function(){
		sec_since_midnight+=60;
		if(sec_since_midnight > 86400){
			sec_since_midnight = 86400;
		}
		$("#time").val(format(sec_since_midnight));
	});

	$("#downMINbutton").click(function(){
		sec_since_midnight-=60;
		if(sec_since_midnight < 0){
			sec_since_midnight = 0;
		}
		$("#time").val(format(sec_since_midnight));
	});

	//autocomplete data
	var data = $("#class_data").html().split('\n');
	data = $.grep(data, function(val){
		return val.indexOf("12") > -1;
	});
	data = $.map(data, function(val){
		return val.split(",")[0] + " " + val.split(",")[1];
	});
	$("#name").typeahead({
		name: 'names',
		local: data
	});

	//special array contains method. it's special don't screw with it
	var arr_contains = function(arr, val){
		if($("#in-tab").hasClass("activeLink")){
			return true;
		}
		if(val == ""){
			return true;
		}
		for(var i = 0; i < arr.length;i++){
			if(arr[i].trim().toLowerCase() === val.trim().toLowerCase())
				return true;
		}
		return false;
	}

	//stuff to run when plus button is clicked
	$("#plus").click(function(){
		var index = ++counter;
		if($("#name").val() !== "" ){
			
			if(!arr_contains(data, $("#name").val())){
				insert_overlay("THIS NAME IS NOT IN THE DATABASE");
				return;
			}
			
			$("#nameList").append(
				"<li  id='name-item-"+index+"'>" + "<span class='name-item'>"+ $("#name").val() + "</span>" +
				"<a href='#' id='name-button-"+index+"' class='delete-buttons'>  -  </a>" +
				"</li>" 
			);
			$("#name").typeahead("setQuery", "");
			$("#name-button-"+index).click(function(){
				$("#name-item-"+index).remove();
			});
		}
	});

	$('body').on('keypress', '#name', function(args) {
		if (args.keyCode === 13) {
			if($(".tt-suggestion p").length > 0){
				$($(".tt-suggestion p")[0]).click();
			}
			$('#plus').click();
			return false;
		}
		else if(args.keyCode === 9){
			$('#destination').focus();
			return false;
		}
	});

	$('body').on('keypress', '#destination', function(args) {
		if (args.keyCode === 13) {
			$('#button').click();
			return false;
		}
	});

	$('#button').click(function(){
		if(!arr_contains(data, $("#name").val())){
			insert_overlay("THIS NAME IS NOT IN THE DATABASE");
			return false;
		}
	});

	$("#in-tab").click(function(){
		$("#in-tab").addClass("activeLink");
		$("#out-tab").removeClass("activeLink");
		$("#dest-div").addClass("hide");
		$("#sign-out-instructions").addClass("hide");
		$("#sign-in-instructions").removeClass("hide");
		$("#time-label").html("Time In: ");
		$("#title").html("Sign In To Campus");
	});

	$("#out-tab").click(function(){
		$("#out-tab").addClass("activeLink");
		$("#in-tab").removeClass("activeLink");
		$("#destination").removeClass("hide");
		$("#sign-in-instructions").addClass("hide");
		$("#sign-out-instructions").removeClass("hide");
		$("#time-label").html("Time Out: ");
		$("#title").html("Sign Out Of Campus");
	});
		
});

var insert_overlay = function(message) {
	overlay = document.getElementById("overlay");
	confirmation = document.getElementById("confirmation");
	zIndex = window.getComputedStyle(overlay).getPropertyValue('z-index');
	//zIndex = style.getPropertyValue('z-index');
	if (zIndex == "-10") {
		overlay.style.backgroundColor = "rgba(0,0,0,0.5)";
		confirmation.style.backgroundColor = "rgba(0,0,0,.5)";
		overlay.style.zIndex = 10;
		confirmation.style.zIndex = 11;
		$("#confirmation").html(message + '<div style="font-size:18px;color:#FFFFFF;opacity:.75;">Click anywhere to dismiss this notification.</div>');
		overlay.onclick = insert_overlay;
		confirmation.onclick = insert_overlay;
		//setTimeout(insert_overlay, 5000);
	}
	else { //if (zIndex > 0) {
		overlay.onclick = null;
		confirmation.onclick = null;
		overlay.style.backgroundColor = "rgba(0,0,0,0)";
		confirmation.style.backgroundColor = "rgba(0,0,0,0)";
		overlay.style.zIndex = -10;
		$("#confirmation").html("");
		confirmation.style.zIndex = -11;
	}
};


/*$("#overlay").click(function(){
	insert_overlay();
}); */
