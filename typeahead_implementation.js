$(document).ready(function(){
	$('input.typeahead').typeahead({
		name: 'accounts',
		local: ['Audi', 'BMW', 'Bugatti', 'Ferrari', 'Ford', 'Lamborghini', 'Mercedes Benz', 'Porsche', 'Rolls-Royce', 'Volkswagen']
	});
});