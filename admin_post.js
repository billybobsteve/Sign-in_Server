function post() {
	//var option = document.getElementById("options").value;
	var form_data = $('#selection_form').serialize();
	var ajax_post = $.ajax({
		url:'action_admin.php',
		type:'post',
		data:form_data
	});
	ajax_post.done(return_data);
}

function return_data(data, textStatus, jqXHR) {
	alert(data);
}