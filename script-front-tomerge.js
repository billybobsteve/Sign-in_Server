var insert_overlay = function() {
	overlay = document.getElementById("overlay");
	style = window.getComputedStyle(overlay);
	zIndex = style.getPropertyValue('z-index');
	if (zIndex < 0) {
		overlay.style.backgroundColor = "rgba(0,0,0,0.5)";
		overlay.style.zIndex = 10;
	}
	else if (zIndex < 0) {
		overlay.style.backgroundColor = "rgba(0,0,0,0)";
		overlay.style.zIndex = -10;
	}
}
