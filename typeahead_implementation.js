$(document).ready(function(){
	$("#name").typeahead({
		name: 'accounts',
		local: ['Chase Goddard', 'Thomas Ragucci', 'Nathan Spring', 'Harrison Lee', 'Some Random Bum']
	})
});