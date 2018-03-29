const yes = document.querySelector(".yes");
const swipe_profil = document.querySelector(".swipe_profil");
const no = document.querySelector(".no");
var php_student = <?php echo json_encode($tab_student); ?>;
var tab_student = JSON.parse(student);
console.log(tab_student);

var recycled = document.querySelector(".bounceOutLeft");
var hearted = document.querySelector(".bounceOutRight");

yes.addEventListener("click", () => {
	swipe_profil.classList.add("bounceOutRight");
	//document.getElementbyId("swipe_name").innerHTML = 
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
