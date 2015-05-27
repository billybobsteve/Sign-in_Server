$(document).ready(function(){
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

	var format = function (v) {
		console.log(v);
		v = Number(v);
		var h = Math.floor(v / 3600);
		v = v - h*3600;
		var m = pad(Math.floor(v / 60));
		var ampm = (h < 12) ? "AM" : "PM";
		if(h!==12){
			h %= 12;
		}
		h = pad(h);
		console.log(h + ":" + "m");
		return h + ":" + m + " " + ampm;
	};

	$("#time").val(format(sec_since_midnight));

	$("#upbutton").click(function(){
		sec_since_midnight+=60;
		if(sec_since_midnight > 86400){
			sec_since_midnight = 86400;
		}
		$("#time").val(format(sec_since_midnight));
	});

	$("#downbutton").click(function(){
		sec_since_midnight-=60;
		if(sec_since_midnight < 0){
			sec_since_midnight = 0;
		}
		$("#time").val(format(sec_since_midnight));
	});

	$("#plus").click(function(){
		var index = ++counter;
		if($("#name").val() !== "" ){
			$("#nameList").append(
				"<li  id='name-item-"+index+"'>" + "<span class='name-item'>"+$("#name").val() + "</span>" +
				"<a href='#' id='name-button-"+index+"' class='delete-buttons'> -</a>" +
				"</li>" 
			);
			$("#name").val("");
			$("#name-button-"+index).click(function(){
				$("#name-item-"+index).remove();
			});
		}
	});

	$('body').on('keypress', '#name', function(args) {
		if (args.keyCode === 13) {
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

	$("#in-tab").click(function(){
		$("#in-tab").addClass("activeLink");
		$("#out-tab").removeClass("activeLink");
		$("#dest-div").addClass("hide");
		$("#sign-out-instructions").addClass("hide");
		$("#sign-in-instructions").removeClass("hide");
		$("#time-label").html("Time In: ");
		$("#title").html("Sign In To Campus");
		console.log("in clicked");
	});

	$("#out-tab").click(function(){
		$("#out-tab").addClass("activeLink");
		$("#in-tab").removeClass("activeLink");
		$("#dest-div").removeClass("hide");
		$("#sign-in-instructions").addClass("hide");
		$("#sign-out-instructions").removeClass("hide");
		$("#time-label").html("Time In: ");
		$("#title").html("Sign Out Of Campus");
		console.log("out clicked");
	});

	var availableTags = ['pls', 'work?', 'PythonsInTheCloset'];

	$("name").autocomplete(function(){
		source: availableTags
	});
	
});




var insert_overlay = function(message) {
	overlay = document.getElementById("overlay");
	confirmation = document.getElementById("confirmation");
	zIndex = window.getComputedStyle(overlay).getPropertyValue('z-index');
	//zIndex = style.getPropertyValue('z-index');
	console.log(zIndex);
	if (zIndex == "-10") {
		console.log("showing");
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
		console.log("hiding");
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
