document.getElementById("checkboxw1").addEventListener("change", function () {
	for (let i = 1; i <= 25; i++) {
		document.getElementById("checkbox" + i).checked = this.checked;
	}
});
