function post() {
	//var option = document.getElementById("options").value;
	//if (window.location.pathname.includes("admin.php")){
	var form_data = $('#selection_form').serialize();
	var post_url = 'action_admin.php';
	//}
	var ajax_post = $.ajax({
		url:post_url,
		type:'post',
		data:form_data
	});
	ajax_post.done(return_data);
}

var edit = function(obj){
	for (i in $("span", obj)){
		console.log("sdf");
	}
}

function return_data(data, textStatus, jqXHR) {
	//if (location.pathname.includes("admin.php")) {
		$("#table").html(data);
		$(".table-entry").append("<a href='#' class='edit-button'>Edit</a>");
		$(".edit-button").click(function(){
			edit($(this).parent());
		});
	//}
}