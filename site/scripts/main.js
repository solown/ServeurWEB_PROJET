function surligne(champ, erreur) {
	if (erreur)
		champ.style.backgroundColor = "#fba";
	else
		champ.style.backgroundColor = "";
}

function verifMail(champ) {
	var regex = /^[a-z]+\.[a-z]+[0-9]*$/;
	if (!regex.test(champ.value)) {
		surligne(champ, true);
		return false;
	} else {
		surligne(champ, false);
		return true;
	}
}


function verifpassword(champ) {
	if (champ.value.length < 20) {
		surligne(champ, true);
		return false;
	} else {
		surligne(champ, false);
		return true;
	}
}

function verifForm(e) {

	var mailOk = verifMail(document.getElementById("mail"));
	var passwordOK = verifpassword(document.getElementById("password"));
	console.log(mailOk + passwordOK);
	if (passwordOK && mailOk)
		return;
	else {
		alert("20 caractères MINIMUM pour le mot de passe et veuillez entrer la partie gauche de votre adresse étudiante");
		e.preventDefault();
	}

}
