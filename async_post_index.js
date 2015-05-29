var global = ""; //global variable
function post() {
	//Temp variable with name and destination
	var interim = $('#sign_out_form').serializeArray();
	//Gets names that were added to group
	var list = document.getElementById('nameList').getElementsByClassName("name-item"); //.getElementsByTagName('li');
	//form data for POST request
	var form_data = "name=" + interim[0].value; 
	var time = document.getElementById('time').value;
	var hour = parseInt(time.substring(0, 2));
	var min = parseInt(time.substring(3, 5));
	hour += (time.substring(6, time.length) == 'AM') ? 0 : 12; // 24 hour time

	var datetime = "" + hour + ":" + min + ":00"; 

	for (var i = 0; i < list.length; i++) { //synthesizes form_data var
			//name_list[i] = list[i].innerText;
			if (form_data !== "name=") {
				form_data += ",";
				//global += ",";
			}
			form_data += list[i].innerText;
			//console.log(form_data);
		}


	global = form_data; 
	global = global.substring(5, global.length);
	global = global.split(',');

	form_data += "&datetime=" + datetime; //adds date & time to form data

	var selector = document.getElementsByClassName("activeLink")[0].id;

	if (selector == "out-tab") { //Signing out
		//var option = document.getElementById("options").value; //if (location.pathname.includes("index.php")) {
		if (document.getElementById("destination").value.trim() === "") {
			alert("Please enter a destination!");
			return;
		}
		//var interim = $('#sign_out_form').serializeArray();
		//var form_data = "name=" + serialize_string(interim[0].value); // + ",";
		//global += interim[0].value;

		//console.log(form_data);
		//console.log("test");

		//var list = document.getElementById('nameList').getElementsByClassName("name-item"); //.getElementsByTagName('li');
		//name_list = [];
		/*for (var i = 0; i < list.length; i++) {
			//name_list[i] = list[i].innerText;
			if (form_data !== "name=") {
				form_data += ",";
				//global += ",";
			}
			form_data += serialize_string(list[i].innerText);
		} */

		form_data += "&destination=" + interim[1].value;

		//form_data += "&datetime=" + datetime;

		form_data = serialize_string(form_data.toLowerCase().trim()); //makes sure string can be passed in URL data

		//console.log(global);
		console.log(form_data);
		//console.log("test2");


		//var form_data = $('#sign_out_form').serialize();
		var post_url = 'action_out.php'
		var ajax_post = $.ajax({ //asynchronous POST request
			url:post_url,
			type:'post',
			data:form_data
		});
		ajax_post.done(return_data_out);
	}
	else {
		//form_data += "&datetime=" + datetime;
		form_data = serialize_string(form_data.toLowerCase().trim());

		var post_url = 'action_in.php'
		var ajax_post = $.ajax({
			url:post_url,
			type:'post',
			data:form_data
		});
		ajax_post.done(return_data_in);
	}
};

function return_data_in(data, textStatus, jqXHR) {
	console.log("data: " + data);
	var signed_in = data.trim().split(',');
	signed_in.pop();
	var message = "";
	var message_error = "";
	console.log(signed_in);
	console.log(signed_in.length);
	var signed_in_success = 0;
	var signed_in_failure = 0;

	for (var i = 0; i < signed_in.length; i++) {
		if (signed_in[i] == '1') 
			signed_in_success++;
		else //if (signed_out[i] == '-1')
			signed_in_failure++;
	}

	for (var i = 0; i < signed_in.length; i++) {
		if (signed_in[i] == '1') {
			message += global[i] + ", ";
		}
		else {
			message_error += global[i] + ", ";
		}
	}

	//console.log(message.substring(0,message.length-2));
	//console.log(message_error.substring(0, message_error.length-2));

	message = (signed_in_success != 0) ? '<span style="color:#00FF00;font-size:24px;opacity:.9;">' +
	message.substring(0, message.length-2) + '</span>' + (signed_in_success > 1 ? ' have' : ' has') + ' successfully been signed back in.' : "";
	message += (signed_in_failure != 0) ? '<div style="color:#FF0000;font-size:24px;opacity:.9;"> Error: ' +
	message_error.substring(0, message_error.length-2) + (signed_in_failure > 1 ? ' have' : ' has') + ' not yet been signed out or' + (signed_in_failure > 1 ? ' have' : ' has') + ' already signed back in. </div>' : "";
	insert_overlay(message);
};

function return_data_out(data, textStatus, jqXHR) {
	//global = global.split(',');
	//alert("test");
	console.log("data:" + data);
	//return;
	//console.log(data);
	var signed_out = data.trim().split(',');
	signed_out.pop();
	var message = "";
	var message_error = "";
	//console.log(signed_out);
	//console.log(signed_out.length);

	var signed_out_success = 0;
	var signed_out_failure = 0;

	for (var i = 0; i < signed_out.length; i++) {
		if (signed_out[i] == '1') 
			signed_out_success++;
		else //if (signed_out[i] == '-1')
			signed_out_failure++;
	}

	/*if (signed_out.length === 1) {
		if (signed_out[0] == '1')
			message = '<span style="color:#00FF00;font-size:24px;opacity:.9;">' + global[0] + '</span>' + " has successfully been signed out to " + '<span style="color:#00FF00;font-size:24px;opacity:.9;">' + document.getElementById("destination").value.trim() + '</span>';
		else
			message = '<span style="color:#FF0000;font-size:24px;opacity:.9;"> ERROR: ' + global[0] + '</span>' + " has already been signed out.";
		insert_overlay(message);
		return;
	} */
	for (var i = 0; i < signed_out.length; i++) {
		if (signed_out[i] == '1') {
			message += global[i] + ", ";
		}
		else {
			message_error += global[i] + ", ";
		}
	}
	//console.log(message);
	console.log(message.substring(0,message.length-2));
	console.log(message_error.substring(0, message_error.length-2));
	//IT WORKS, I PROMISE
	message = (signed_out_success != 0) ? '<span style="color:#00FF00;font-size:24px;opacity:.9;">' +
	message.substring(0, message.length-2) + '</span>' + (signed_out_success > 1 ? ' have' : ' has') + ' successfully been signed out to ' + '<span style="color:#00FF00;font-size:24px;opacity:.9;">' + document.getElementById("destination").value.trim() + '</span>' :
	"";
	message += (signed_out_failure != 0) ? '<div style="color:#FF0000;font-size:24px;opacity:.9;"> Error: ' +
	message_error.substring(0, message_error.length-2) + (signed_out_failure > 1 ? ' have' : ' has') + ' already been signed out or' + (signed_out_failure > 1 ? ' have' : ' has') + ' already signed back in. </div>' : "";

	//message = (message_error.trim() === "") ? '<span style="color:#00FF00;font-size:24px;opacity:.9;">' +
	//message.substring(0, message.length-2) + '</span>' + (signed_out_success > 1 ? ' have' : ' has') + ' successfully been signed out to ' + '<span style="color:#00FF00;font-size:24px;opacity:.9;">' + document.getElementById("destination").value.trim() + '</span>' : '<span style="color:#00FF00;font-size:24px;opacity:.9;">' +
	//message.substring(0, message.length-2) + '</span>' + (signed_out_success > 1 ? ' have' : ' has') +  ' successfully been signed out to ' + '<span style="color:#00FF00;font-size:24px;opacity:.9;">' + document.getElementById("destination").value.trim() + '</span> <div style="color:#FF0000;font-size:24px;opacity:.9;"> ERROR: ' +
	//message_error.substring(0, message_error.length-2) + (signed_out_failure > 1 ? ' were' : ' was') + ' already signed out. </div>';
	
	insert_overlay(message);
};

function serialize_string(string) { //TODO serialize apostrophe
	string.trim();
	//while (string.includes(' ')) { // Goddamn Safari bullshit
	while (string.indexOf(' ') > -1) {
		string = string.replace(' ', '+');
	}	
	return string;
};
