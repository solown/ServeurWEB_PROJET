function get_adj() {
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			if(this.responseText != "OK"){
				var json = window.JSON ? JSON.parse(this.reponseText) : eval("("+this.responseText+")");
				return json;
			}
			else {
				alert("Erreur : impossible de charger les adjectifs...");
				return null;
			}
		}
	};

	xhttp.open("GET", "../model/get-adj.php", true);

	xhttp.send(null);
	
}

alert(get_adj());
