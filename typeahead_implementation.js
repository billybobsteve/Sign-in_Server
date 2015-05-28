$(document).ready(function(){
	var data = $("#class_data").html().split('\n');
	data = $.grep(data, function(val){
		if(val.indexOf("12") > -1){
			return val;
		}
	});
	data = $.map(data, function(val){
		return val.split(",")[0] + val.split(",")[1];
	});
	console.log(data);
	$("#name").typeahead({
		name: 'names',
		local: ['Nicolas Wilmer', 'Nine Times Ten', 'Never Say Never', 'Now I go Home L0LL','Chase Goddard', 'Thomas Ragucci', 'Nathan Spring', 'Harrison Lee', 'Some Random Bum']
	});
});