const yes = document.querySelector(".yes");
const swipe_profil = document.querySelector(".swipe_profil");
const no = document.querySelector(".no");
var recycled = document.querySelector(".bounceOutLeft");
var hearted = document.querySelector(".bounceOutRight");

yes.addEventListener("click", () => {
	setTimeout(function() { setNewProfile();}, 1000);
	swipe_profil.classList.add("bounceOutRight");
});

no.addEventListener("click", () => {
	setTimeout(function() { setNewProfile();}, 1000);
	swipe_profil.classList.add("bounceOutLeft");
});

function top_back() {
	swipe_profil.classList.remove("bounceOutRight");
	swipe_profil.classList.remove("bounceOutLeft");
	swipe_profil.classList.add("bounceInDown");
}



function setNewProfile(){
	if(students.length <= 0) return;
	
	document.getElementById("swipe_name").innerHTML = students[0].surname;
	if(students[0].description != null) //TODO Remove when we'll have a clean DB
		document.getElementById("swipe_description").innerHTML = students[0].description;

	var adjs = students[0].adj1 + " - " + students[0].adj2 + " - " + students[0].adj3;
	document.getElementById("swipe_adj").innerHTML = adjs;

	if(students[0].pic != undefined) document.getElementById("swipe_picture").src = students[0].pic;
	else document.getElementById("swipe_picture").src = '';

	students.splice(0, 1);
	
	top_back();
}	

swipe_profil.addEventListener("webkitAnimationEnd", top_back, false);
swipe_profil.addEventListener("animationend", top_back, false);
setNewProfile();
