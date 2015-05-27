function post() {
	//var option = document.getElementById("options").value; //if (location.pathname.includes("index.php")) {
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
	var ajax_post = $.ajax({
		url:post_url,
		type:'post',
		data:form_data
	});
	ajax_post.done(return_data);
}

function return_data(data, textStatus, jqXHR) {
	//alert("test");
	//console.log(data);
	var signed_out = data.trim().split(' ');
	var message = "";
	console.log(signed_out);
	console.log(signed_out.length);
	if (signed_out.length === 1) {
		message = '<span style="color:#00FF00;font-size:24px;opacity:.9;">' + signed_out[0] + '</span>' + " has successfully been signed out to " + '<span style="color:#00FF00;font-size:24px;opacity:.9;">' + document.getElementById("destination").value.trim() + '</span>';
		insert_overlay(message);
		return;
	}
	for (var i = 0; i < signed_out.length; i++) {
		message += signed_out[i] + ", ";
	}
	//console.log(message);
	//console.log(message.substring(0,message.length-2));
	message = '<span style="color:#00FF00;font-size:24px;opacity:.9;">' + message.substring(0, message.length-2) + '</span>' + ' have successfully been signed out to ' + '<span style="color:#00FF00;font-size:24px;opacity:.9;">' + document.getElementById("destination").value.trim() + '</span>';
	insert_overlay(message);
}

var includes_char = function(str, search_char){
	for(var i = 0;i<str.length();i++){
		if(str.charAt(i) === search_char){
			return true;
		}
		return false;
	}
}

function serialize_string(string) {
	string.trim();
	//while (string.includes(' ')) { // Goddamn Safari bullshit
	while (includes_char(string, ' '))
		string = string.replace(' ', '+');
	}	
	return string;
}
