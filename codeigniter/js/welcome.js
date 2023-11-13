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
	} else if (checkbox.id === "checkbox6") {
		document.getElementById("checkbox7").checked = true;
		document.getElementById("checkbox8").checked = true;
		document.getElementById("checkbox9").checked = true;
		document.getElementById("checkbox10").checked = true;
		total = parseInt(checkbox.value);
	} else if (checkbox.id === "checkbox11") {
		document.getElementById("checkbox12").checked = true;
		document.getElementById("checkbox13").checked = true;
		document.getElementById("checkbox14").checked = true;
		document.getElementById("checkbox15").checked = true;
		total = parseInt(checkbox.value);
	} else if (checkbox.id === "checkbox16") {
		document.getElementById("checkbox17").checked = true;
		document.getElementById("checkbox18").checked = true;
		document.getElementById("checkbox19").checked = true;
		document.getElementById("checkbox20").checked = true;
		total = parseInt(checkbox.value);
	} else if (checkbox.id === "checkbox21") {
		document.getElementById("checkbox22").checked = true;
		document.getElementById("checkbox23").checked = true;
		document.getElementById("checkbox24").checked = true;
		document.getElementById("checkbox25").checked = true;
		total = parseInt(checkbox.value);
	} else {
		total -= parseInt(checkbox.value);
		if (checkbox.id === "checkbox1") {
			document.getElementById("checkbox2").checked = false;
			document.getElementById("checkbox3").checked = false;
			document.getElementById("checkbox4").checked = false;
			document.getElementById("checkbox5").checked = false;
		} else if (checkbox.id === "checkbox6") {
			document.getElementById("checkbox7").checked = false;
			document.getElementById("checkbox8").checked = false;
			document.getElementById("checkbox9").checked = false;
			document.getElementById("checkbox10").checked = false;
		} else if (checkbox.id === "checkbox11") {
			document.getElementById("checkbox12").checked = false;
			document.getElementById("checkbox13").checked = false;
			document.getElementById("checkbox14").checked = false;
			document.getElementById("checkbox15").checked = false;
		} else if (checkbox.id === "checkbox16") {
			document.getElementById("checkbox17").checked = false;
			document.getElementById("checkbox18").checked = false;
			document.getElementById("checkbox19").checked = false;
			document.getElementById("checkbox20").checked = false;
		} else if (checkbox.id === "checkbox21") {
			document.getElementById("checkbox22").checked = false;
			document.getElementById("checkbox23").checked = false;
			document.getElementById("checkbox24").checked = false;
			document.getElementById("checkbox125").checked = false;
		} else {
			document.getElementById("checkbox1").checked = false;
			document.getElementById("checkbox6").checked = false;
			document.getElementById("checkbox11").checked = false;
			document.getElementById("checkbox16").checked = false;
			document.getElementById("checkbox21").checked = false;
		}
	}
	document.getElementById("total").innerText = total;
}
