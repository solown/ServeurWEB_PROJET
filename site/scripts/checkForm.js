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
		document.getElementById("mail_not_valid").style.display = "none";
		return true;
	}
}

function mailexist(){
		console.log("we are in mailexist");
		var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function(){
				if(this.readyState == 4 && this.status == 200){
					if(this.responseText == "NOK"){
						var request = new XMLHttpRequest();
						request.open("POST", "../controller/forgot_passwd.php", true);
						request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						var mail = document.getElementsByName("mail")[0].value;
						request.send("mail=" + mail);
						console.log("exist");
						return true;
					}
					else {
						console.log("mail don't exist");
						highlight(document.getElementsByName("mail")[0], true);
						document.getElementById("mail_dont_existe").style.display = "block";
						console.log("nok");
					}

				}
			};

			xhttp.open("POST", "../controller/sign_up.php", true);
			xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

			var mail = document.getElementsByName("mail")[0].value;

			xhttp.send("mail=" + mail);
			console.log("end");
			return false;
}


function checkPassword(field) {
	if (field.value.length < 8) {
		highlight(field, true);
		document.getElementById("password_not_valid").style.display = "block";
		return false;
	} else {
		highlight(field, false);
		document.getElementById("password_not_valid").style.display = "none";
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
