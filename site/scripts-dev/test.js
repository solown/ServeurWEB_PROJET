import React from "react";
import ReactDOM from "react-dom";

class AdjectiveContainer extends React.Component {
	
	render(){
		let adj = this.props.adj;
		return (
			<div style={{width: "100%", height: "100%"}}>
				{adj.map(function(name, index){
						return <Adjective wording={name}/>
				})}
			</div>
		);
	}
	
};

class Adjective extends React.Component {
	
	constructor(props){
		super(props);
		this.x = Math.random()*0.5;
		this.y = Math.random()*1;
		this.size = 2 + Math.random()*2;
	}

	render(){
		return (
			<div style={{
						position: "absolute",
						marginLeft: this.x * 100 + '%',
						marginTop: this.y * 100 + '%',
						fontSize: this.size + 'vw'
						}}>
				{this.props.wording}
			</div>
		);
	}
};

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
	let half = Math.trunc(adj.length/2);
	ReactDOM.render(<AdjectiveContainer adj={adj.splice(0, half)}/>, document.getElementById("left-adj-container"));
	ReactDOM.render(<AdjectiveContainer adj={adj.splice(0, adj.length)}/>, document.getElementById("right-adj-container"));
}

get_adj();

