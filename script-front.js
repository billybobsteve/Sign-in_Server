var pad = function(x){
	if(x<10){
		return "0"+x;
	}
	return x;
}
var now = new Date();
var hours = now.getHours();
var mins = now.getMinutes();
$("#time").val(pad(hours)+":"+pad(mins)+" AM");
console.log("CHASE IS THE BEST PERSON");
$.widget( "ui.timespinner", $.ui.spinner, {
    options: { step: 1, page: 60 },
    _parse: function( v ) {
    	if(Number(v) !== NaN){
    		console.log("not number P: "+v);
    		return v;
    	}
    	console.log("P: "+v);
        var a = [v.split(":")[0]].concat(v.split(":")[1].split(" "));
        var multiplier = (a[2] === "AMPM") ? 1:2;
        return Number(a[0])*3600*multiplier+Number(a[1])*60;
    },
    _format: function( v ) {
    	if(Number(v) === NaN){
    		console.log("not number F: "+v);
    		return v;
    	}
    	console.log("F: "+v);
    	v = Number(v);
    	var h = ("00"+(v%3600)).substring(2);
    	v = Math.floor(v / 3600);
    	var m = ("00"+(v%60)).substring(2);
    	var ampm = (h < 12) ? "AM":"PM";
    	h %= 12;
    	return h+":"+m+" "+ampm;
    }
});
$( "#time" ).timespinner();
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
/*
if ( typeof value === "string" ) {
            if ( Number( value ) == value ) {
                return Number( value );
            }
            if(value == '') {
                return null;
            }
            var t = value.split(':', 2);
            a = t[1].split(' ');
            t[1] = a[0];
            b = (a[1] == "AM") ? 1:2;
            var n = (Number(t[0]) *  b * 60 + Number(t[1]));
            return Number(n);
        }
        return value;



console.log("F:"+value);
        if(value == null) {
            return '';
        }
        console.log(value);
        var v = Number(value);
        while(v < 0) {
            v += (24 * 60);
        }
        v = (v % (24 * 60));
        var mm = "00" + (v % 60);
        mm = mm.substring(mm.length - 2);
        var hh = "00" + (Math.floor(v / 60) % 12);
        hh = hh.substring(hh.length - 2);
        var ampm = ""
        if(Math.floor(v/60)%24 < 12){
        	ampm="AM"
        }
        else{
        	ampm="PM"
        }
        return hh + ":" + mm + " " + ampm;
*/