var insert_overlay = function() {
	overlay = document.getElementById("overlay");
	console.log(overlay.style.zIndex);
	if (overlay.style.zIndex < 0) {
		overlay.style.backgroundColor = "rgba(0,0,0,0.5)";
		overlay.style.zIndex = 10;
	}
	else if (overlay.style.zIndex < 0) {
		overlay.style.backgroundColor = "rgba(0,0,0,0)";
		overlay.style.zIndex = -10;
	}
}
