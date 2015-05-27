$(document).ready(function(){
	var edit = function(obj){
		$("span", obj).html("<input type='text'>")
	}
	/*
	$('#options').on('change', function(){
		if($(this).val() === "edit_student"){
			$("#other_info").show();
		}
		else{
			$("#other_info").hide();
		}
	});
*/
	$("#submit").click(function(){
		console.log("okeh");
		console.log(document.getElementsByClassName("table-entry").length);
		$(".table-entry").append("<a href='#' class='edit-button'>Edit</a>");
	});
	$("#edit-button").click(function(){
		edit("#edit-button").parent();
	});
});

