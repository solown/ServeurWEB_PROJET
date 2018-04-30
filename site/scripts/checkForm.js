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
		document.getElementById("mail_not_valid").style.display = "block";
		return false;
	} else {
		highlight(field, false);
		return true;
	}
}


function checkPassword(field) {
	if (field.value.length < 8) {
		highlight(field, true);
		document.getElementById("password_not_valid").style.display = "block";
		return false;
	} else {
		highlight(field, false);
		return true;
	}
}

function verifForm(e) {

	var mailOk = checkMail(document.getElementById("mail"));
	var passwordOK = checkPassword(document.getElementById("password"));
	console.log(mailOk + passwordOK);
	if (passwordOK && mailOk){
		return true;
	}
}

function verifFormForgot(e) {

	var mailOk = checkMail(document.getElementById("mail"));
	if (mailOk)
		return;
	else {
		alert("Veuillez entrer la partie gauche de votre adresse étudiante");
		e.preventDefault();
	}


}
var form = document.getElementById("formsignup");
form.addEventListener('submit', function () {
	form.submit.disabled = true;
});
var form = document.getElementById("form_login");
form.addEventListener('submit', function () {
	form.submit.disabled = true;
});
