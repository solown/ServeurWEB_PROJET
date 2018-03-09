const yes = document.querySelector(".yes")
const swipe_profil = document.querySelector(".swipe_profil")
const no = document.querySelector(".no")

yes.addEventListener("click", () => {
	swipe_profil.classList.add("bounceOutRight");
})

no.addEventListener("click", () => {
	swipe_profil.classList.add("bounceOutLeft");
})
