
function update(){
	document.getElementsByClassName('resume')[0].style.display = 'none';
	document.getElementById('inputresume').style.display = 'block';
	document.getElementsByClassName('buttonupdate')[0].style.display = 'none';
	document.getElementsByClassName('buttonconfirm')[0].style.display = 'block';
}
function cancel(){
	document.getElementsByClassName('resume')[0].style.display = 'block';
	document.getElementById('inputresume').style.display = 'none';
	document.getElementsByClassName('buttonupdate')[0].style.display = 'block';
	document.getElementsByClassName('buttonconfirm')[0].style.display = 'none';
}


var pathpic = "<?php echo $picstudent; ?>";

document.getElementsByClassName('input_btn')[0].style.backgroundImage = pathpic;


