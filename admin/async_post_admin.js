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

function return_data(data, textStatus, jqXHR) {
	//if (location.pathname.includes("admin.php")) {
		$("#table").html(data);
	//}
}