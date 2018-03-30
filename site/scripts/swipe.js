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
	if(php_tab_student.length <= 0) return;
	
	document.getElementById("swipe_name").innerHTML = php_tab_student[0].name;
	if(php_tab_student[0].description != null) //TODO Remove when we'll have a clean DB
		document.getElementById("swipe_description").innerHTML = php_tab_student[0].description;
	php_tab_student.splice(0, 1);
	
	top_back();
}	

swipe_profil.addEventListener("webkitAnimationEnd", top_back, false);
swipe_profil.addEventListener("animationend", top_back, false);
