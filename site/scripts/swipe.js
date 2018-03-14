const yes = document.querySelector(".yes")
const swipe_profil = document.querySelector(".swipe_profil")
const no = document.querySelector(".no")



yes.addEventListener("click", () => {
	$(document).trigger('swipe:yes');
});

$(document).on('swipe:yes', function () {
	swipe_profil.classList.remove("bounceInDown");
	swipe_profil.classList.add("bounceOutRight");
	$(document).trigger('swipe:done');
})



no.addEventListener("click", () => {
	$(document).trigger('swipe:no');
})


$(document).on('swipe:no', function () {
	swipe_profil.classList.remove("bounceInDown");
	swipe_profil.classList.add("bounceOutleft");
	console.log("swipe:no");
	setTimeout(function () {
		//$(document).trigger('swipe:done');
		console.log("swipe:done");
	}, 1500);
})

$(document).on('swipe:no', function () {
	$(document).trigger('swipe:done');
})

$(document).on('swipe:done', function () {
	swipe_profil.classList.remove("bounceOutRight");
	swipe_profil.classList.remove("bounceOutLeft");
	swipe_profil.classList.add("bounceInDown");
	console.log("je suis ici");
})

/*
function swipe_yes() {
	swipe_profil.classList.remove("bounceInDown");
	swipe_profil.classList.add("bounceOutRight");
}

function swipe_add() {
	swipe_profil.classList.remove("bounceOutRight");
	swipe_profil.classList.add("bounceInDown");

}
*/
