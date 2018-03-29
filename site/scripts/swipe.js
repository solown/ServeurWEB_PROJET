const yes = document.querySelector(".yes");
const swipe_profil = document.querySelector(".swipe_profil");
const no = document.querySelector(".no");
var recycled = document.querySelector(".bounceOutLeft");
var hearted = document.querySelector(".bounceOutRight");

yes.addEventListener("click", () => {
	swipe_profil.classList.add("bounceOutRight");
	document.getElementById("swipe_name").innerHTML = tab_student[0].name;
	document.getElementById("swipe_name").innerHTML = tab_student[0].description;
	tab_student.splice(0,1);
	console.log(tab_student);
});

no.addEventListener("click", () => {
	swipe_profil.classList.add("bounceOutLeft");
});

function top_back() {
	swipe_profil.classList.remove("bounceOutRight");
	swipe_profil.classList.remove("bounceOutLeft");
	swipe_profil.classList.add("bounceInDown");
}



swipe_profil.addEventListener("webkitAnimationEnd", top_back, false);
swipe_profil.addEventListener("animationend", top_back, false);
