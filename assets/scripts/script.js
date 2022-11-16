function toogleVisibility(id_input, id_button) {
	var icon = id_button.children[0];

	id_input.type =
		id_input.type === "password"
			? (icon.classList.remove("fa-eye"),
			  icon.classList.add("fa-eye-slash"),
			  "text")
			: (icon.classList.remove("fa-eye-slash"),
			  icon.classList.add("fa-eye"),
			  "password");
}

document.body.onresize = () => {
	var imgs = document.getElementsByClassName("img1:1");
	for (let index = 0; index < imgs.length; index++) {
		const element = imgs[index];
		element.style.height = element.offsetWidth + "px";
	}
}

document.body.onload = () => {
	var imgs = document.getElementsByClassName("img1:1");
	for (let index = 0; index < imgs.length; index++) {
		const element = imgs[index];
		element.style.height = element.offsetWidth + "px";
	}
}

document.getElementById("cupon").onchange = () => {
	var element = document.getElementById("totalPrice");
	element.textContent -= element.textContent * (document.getElementById("cupon").value/100);
}