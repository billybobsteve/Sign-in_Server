function post() {
	//var option = document.getElementById("options").value;
	var form_data = ('#selection_form').serialize();
	$.ajax({
		url:'action_admin.php',
		type:'post',
		data:form_data
		done:function(data, textStatus, jqXHR){
			alert("success");
			console.log(data);
		}
	});
}