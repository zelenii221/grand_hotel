function show(state, what){
	var x = document.getElementsByClassName("background_registration")[0];
	x.style.display = state;


	document.getElementById(what).style.display = state;
	
}