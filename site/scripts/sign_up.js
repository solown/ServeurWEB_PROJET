function sign_up() {
	console.log("debut de sign_up.js");
	var xhttp = new XMLHttpRequest();
	
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			if(this.responseText == "OK"){
				console.log("ok");
				highlight(document.getElementsByName("mail")[0], false);
				highlight(document.getElementsByName("password")[0], false);
				xhttp.open("POST", "../controller/register-confirmation.php", true);
				xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

				var mail = document.getElementsByName("mail")[0].value;
				var password = document.getElementsByName("password")[0].value;
				var year = document.getElementsByName("year")[0].value;
		
				xhttp.send("mail=" + mail + "&password=" + password + "&year=" + year);
				
			}
			else {
				console.log("mail existe deja");
				highlight(document.getElementsByName("mail")[0], true);
				highlight(document.getElementsByName("password")[0], true);
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
