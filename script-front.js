var pad = function(x){
	if(x<10){
		return "0"+x;
	}
	return x;
}
var now = new Date()
var hours = new now.getHours();
var mins = new now.getMinutes();
$("#time").val(pad(hours)+":"+pad(mins));

$.widget( "ui.timespinner", $.ui.spinner, {
    options: { step: 1, page: 1 },
    _parse: function( value ) {
        if ( typeof value === "string" ) {
            if ( Number( value ) == value ) {
                return Number( value );
            }
            if(value == '') {
                return null;
            }
            var t = value.split(':', 2);
            var n = (Number(t[0]) * 60 + Number(t[1]));
            return Number(n);
        }
        return value;
    },
    _format: function( value ) {
        if(value == null) {
            return '';
        }
        var v = Number(value);
        while(v < 0) {
            v += (24 * 60);
        }
        v = (v % (24 * 60));
        var mm = "00" + (v % 60);
        mm = mm.substring(mm.length - 2);
        var hh = "00" + (Math.floor(v / 60) % 24);
        hh = hh.substring(hh.length - 2);
        return hh + ":" + mm;
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