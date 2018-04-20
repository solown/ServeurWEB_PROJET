function highlight(field, error) {
	if (error)
		field.style.backgroundColor = "#fba";
	else
		field.style.backgroundColor = "";
}

function checkMail(field) {
	var regex = /^[a-z]+\.[a-z]+[0-9]*$/;
	if (!regex.test(field.value)) {
		highlight(field, true);
		return false;
	} else {
		highlight(field, false);
		return true;
	}
}


function checkPassword(field) {
	if (field.value.length < 8) {
		highlight(field, true);
		return false;
	} else {
		highlight(field, false);
		return true;
	}
}

function checkForm(e) {

	var mailOk = checkMail(document.getElementById("mail"));
	var passwordOK = checkPassword(document.getElementById("password"));
	console.log(mailOk + passwordOK);
	if (passwordOK && mailOk)
		return;
	else {
		alert("8 caractères MINIMUM pour le mot de passe et veuillez entrer la partie gauche de votre adresse étudiante");
		e.preventDefault();
	}

}
var form = document.getElementById("formsignup");
form.addEventListener('submit', function () {
    form.submit.disabled = true;
});
