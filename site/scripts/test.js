function get_adj() {
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			if(this.responseText != false){
				var json = JSON.parse(this.responseText);
				display_adj(json);
			}
			else
				console.log("Erreur : impossible de charger les adjectifs...");
		}
	};

	xhttp.open("GET", "../model/get-adj.php", true);
	xhttp.send();
}

function display_adj(adj) {
	for(var i = 0; i < adj.length; ++i){
		console.log(adj[i]);
	}	
}

get_adj();

