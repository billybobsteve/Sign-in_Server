var pad = function(x){
	if(x<10){
		return "0"+x;
	}
	return x;
}
var now = new Date();
var hours = now.getHours();
var mins = now.getMinutes();
var sec_since_midnight = hours*3600+mins*60;
console.log("CHASE IS THE BEST PERSON");


var format = function (v) {
	console.log(v);
	v = Number(v);
	var h = Math.floor(v / 3600);
	v = v - h*3600;
	var m = pad(Math.floor(v / 60));
	var ampm = (h < 12) ? "AM" : "PM";
	if(h!=12)
		h %= 12;
	h = pad(h);
	console.log(h + ":" + "m");
	return h + ":" + m + " " + ampm;
};

$("#time").val(format(sec_since_midnight));

$("#upbutton").click(function(){
	sec_since_midnight+=60;
	if(sec_since_midnight > 86400)
		sec_since_midnight = 86400;
	$("#time").val(format(sec_since_midnight));
})

$("#downbutton").click(function(){
	sec_since_midnight-=60;
	if(sec_since_midnight < 0)
		sec_since_midnight = 0;
	$("#time").val(format(sec_since_midnight));
})

$("#plus").click(function(){
	if($("#name").val() != "" ){
		$("#nameList").append(
			"<li>" + $("#name").val() +"</li>"
		);
		$("#name").val("")
	}
});

$('body').on('keypress', '#name', function(args) {
	if (args.keyCode == 13) {
		$('#plus').click();
		return false;
	}
});

$("in-tab").click(function(){
	$("in-tab").addClass("activeLink");
	$("out-tab").removeClass("activeLink");
	$("destination").addClass("hide");
});

$("out-tab").click(function(){
	$("out-tab").addClass("activeLink");
	$("in-tab").removeClass("activeLink");
	$("destination").removeClass("hide");
});