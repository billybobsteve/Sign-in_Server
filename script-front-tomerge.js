var insert_overlay = function() {
	overlay = document.getElementById("overlay");
	confirmation = document.getElementById("confirmation");
	zIndex = window.getComputedStyle(overlay).getPropertyValue('z-index');
	//zIndex = style.getPropertyValue('z-index');
	if (zIndex < 0) {
		overlay.style.backgroundColor = "rgba(0,0,0,0.5)";
		confirmation.style.backgroundColor = "rgba(0,0,0,.5)";
		overlay.style.zIndex = 10;
	}
	else if (zIndex > 0) {
		overlay.style.backgroundColor = "rgba(0,0,0,0)";
		confirmation.style.backgroundColor = "rgba(0,0,0,0)";
		overlay.style.zIndex = -10;
	}
}
/*$("#overlay").click(function(){
	insert_overlay();
}); */
