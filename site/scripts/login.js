function login() {
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			if(this.responseText == "OK"){
				highlight(document.getElementsByName("mail")[0], false);
				highlight(document.getElementsByName("password")[0], false);
				window.location.href="../view/updateprofile.html";
				
			}
			else {
				highlight(document.getElementsByName("mail")[0], true);
				highlight(document.getElementsByName("password")[0], true);
			}
		}
	};

	xhttp.open("POST", "../controller/login.php", true);
	xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	var mail = document.getElementsByName("mail")[0].value;
	var password = document.getElementsByName("password")[0].value;

	xhttp.send("mail=" + mail + "&password=" + password);
	return false;
}
