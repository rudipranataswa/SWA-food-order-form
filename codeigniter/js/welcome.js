let total = 0;

function addValue(checkbox) {
	if (checkbox.checked) {
		total += parseInt(checkbox.value);
		if (checkbox.id === "checkbox1") {
			document.getElementById("checkbox2").checked = true;
			document.getElementById("checkbox3").checked = true;
			document.getElementById("checkbox4").checked = true;
			document.getElementById("checkbox5").checked = true;
			total = parseInt(checkbox.value);
		}
	} else {
		total -= parseInt(checkbox.value);
		if (checkbox.id === "checkbox1") {
			document.getElementById("checkbox2").checked = false;
			document.getElementById("checkbox3").checked = false;
			document.getElementById("checkbox4").checked = false;
			document.getElementById("checkbox5").checked = false;
		} else {
			document.getElementById("checkbox1").checked = false;
		}
	}
	document.getElementById("total").innerText = total;
}
