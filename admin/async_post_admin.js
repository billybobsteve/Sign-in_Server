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
	$(".edit-button").remove();
	for (var i = 0; i<$("span", obj).length;i++){
		$($("span", obj)[i]).html("<input class='text-box' type='text' value='"+$($("span", obj)[i]).text()+"'>")
	}
	$(obj).append("<input type='button' value='Apply' id='apply'>");
	$("#apply").click(function(){
		var vals = [];
		console.log()
		for (var i = 0; i<$(".text-box", obj).length;i++){
			vals[i] = $($(".text-box", obj)[i]).val();
		}
		for(var i = 0; i<$(".text-holder", obj).length;i++){
			$($(".text-holder", obj)[i]).html(vals[i]);
		}
		$("#apply").remove();
		$(".table-entry").append("<a href='#' class='edit-button'>Edit</a>");
	});
}

function return_data(data, textStatus, jqXHR) {
	//if (location.pathname.includes("admin.php")) {
		$("#table").html(data);
		$(".table-entry").append("<a href='#' class='edit-button'>Edit</a>");
		$(".edit-button").click(function(){
			edit($(this).parent());
		});
		$("div ul li span").addClass("text-holder");
	//}
}