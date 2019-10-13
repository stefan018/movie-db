function addCast() {
	var div = document.getElementById("casts-holder")
	var input = document.createElement("INPUT");
	input.setAttribute("type", "text");
	input.setAttribute('name', "cast[]");
	div.prepend(input);

}