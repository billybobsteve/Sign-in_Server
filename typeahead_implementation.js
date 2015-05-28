$(document).ready(function(){
	var data = $("#class_data").html().split('\n');
	$.grep(data, function(val){
		if(val.indexOf("12") > -1){
			return val;
		}
	});
	console.log(data);
	$("#name").typeahead({
		name: 'names',
		local: ['Chase Goddard', 'Thomas Ragucci', 'Nathan Spring', 'Harrison Lee', 'Some Random Bum']
	})
});