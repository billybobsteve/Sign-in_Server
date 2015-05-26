var insert_overlay = function() {
	overlay = document.getElementById("overlay");
	//overlay.onclick = insert_overlay;
	confirmation = document.getElementById("confirmation");
	zIndex = window.getComputedStyle(overlay).getPropertyValue('z-index');
	//zIndex = style.getPropertyValue('z-index');
	if (zIndex < 0) {
		overlay.style.backgroundColor = "rgba(0,0,0,0.5)";
		confirmation.style.backgroundColor = "rgba(0,0,0,.5)";
		overlay.style.zIndex = 10;
		$("#confirmation").html("You have successfully been signed out. <br> Click anywhere to dismiss this screen.");
		//setTimeout(insert_overlay, 5000);
	}
	else if (zIndex > 0) {
		overlay.style.backgroundColor = "rgba(0,0,0,0)";
		confirmation.style.backgroundColor = "rgba(0,0,0,0)";
		overlay.style.zIndex = -10;
		$("#confirmation").html("");
	}
}
/*$("#overlay").click(function(){
	insert_overlay();
}); */
