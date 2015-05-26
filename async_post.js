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
		var interim = $('#sign_out_form').serializeArray();
		var form_data = "name=" + serialize_string(interim[0].value); // + ",";

		//console.log(form_data);
		//console.log("test");

		var list = document.getElementById('nameList').getElementsByTagName('li');
		//name_list = [];
		for (var i = 0; i < list.length; i++) {
			//name_list[i] = list[i].innerText;
			if (form_data !== "name=") {
				form_data += ",";
			}
			form_data += serialize_string(list[i].innerText);
		}

		form_data += "&destination=" + serialize_string(interim[1].value);

		console.log(form_data);
		//console.log("test2");


		//var form_data = $('#sign_out_form').serialize();
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
		//console.log(data);
		var signed_out = data.split(' ');
		var message = "";
		if (signed_out.length === 1) {
			message = signed_out[0] + " has successfully been signed out.";
			insert_overlay(message);
			return;
		}
		for (var i = 0; i < signed_out.length; i++) {
			message += signed_out[i] + ", ";
		}
		console.log(message);
		console.log(message.substring(0,message.length-2));
		message = message.substring(0, message.length-2) + ' have successfully been signed out.'
		insert_overlay(message);
	}
}

function serialize_string(string) {
	string.trim();
	while (string.includes(' ')) {
		string = string.replace(' ', '+');
	}	
	return string;
}