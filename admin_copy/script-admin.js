$(document).ready(function(){
	$('#options').on('change', function(){
		if($(this).val() === "edit_student"){
			$("#other_info").show();
		}
		else{
			$("#other_info").hide();
		}
	});	
});

