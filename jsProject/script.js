var popped = 0;
document.addEventListener("click", function (e) {
	if (e.target.className === "ballon") {
		console.log("click event");
		//console.log(e.target);
		//e.target.style.display = "none";
		e.target.style.backgroundColor = "white";
		e.target.textContent = "POP!";
		popped++;
		console.log(popped);
		checkAll();
	}
});

function checkAll() {
	if (popped === 10) {
		var balloondiv = document.querySelector(".ballon-div");
		balloondiv.innerHTML = "";
		var noballoondiv = document.querySelector("#no-ballons");
		noballoondiv.style.display = "block";
	}
}
