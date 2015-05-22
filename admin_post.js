function post() {
	//var option = document.getElementById("options").value;
	var form_data = $('#selection_form').serialize();
	var ajax_post = $.ajax({
		url:'action_admin.php',
		type:'post',
		data:form_data
	});
	alert(ajax_post.data);
}