function post() {
	//var option = document.getElementById("options").value;
	if (location.pathname.includes("admin.php")){
		var form_data = $('#selection_form').serialize();
		var post_url = 'action_admin.php';
	}
	else { //if (location.pathname.includes("index.php")) {
		if (document.getElementById("destination").value.trim() === "") {
			alert("Please enter a destination!");
			return;
		}

		var list = document.getElementById('nameList').getElementsByTagName('li');
		name_list = [];
		for (var i = 0; i < list.length; i++) {
			name_list[i] = list[i].innerText;
		}
		console.log(name_list);
		var form_data = $('#sign_out_form').serialize();
		var post_url = 'action_out.php'
	}
	var ajax_post = $.ajax({
		url:post_url,
		type:'post',
		data:form_data
	});
	ajax_post.done(return_data);
}

function return_data(data, textStatus, jqXHR) {
	if (location.pathname.includes("admin.php")) {
		$("#table").html(data);
	}
	else { //if (location.pathname.includes("index.php")) {
		//alert("test");
		insert_overlay();
	}
}