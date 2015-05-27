$(document).ready(function(){
	$("#other_info").hide();
	$('#options').on('change', function(){
		if($(this).val() === "edit_student"){
			$("#other_info").show();
		}
		else{
			$("#other_info").hide();
		}
	});
	$("#submit").click(function(){
		$(".table_entry").css("list-style-type","none");
	});
});

