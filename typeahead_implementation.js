$(document).ready(function(){
	var data = $("#class_data").html().split('\n');
	data = $.grep(data, function(val){
		return val.indexOf("12") > -1;
	});
	data = $.map(data, function(val){
		return val.split(",")[0] + " " + val.split(",")[1];
	});
	console.log(data);
	$("#name").typeahead({
		name: 'names',
		local: data
	});
});