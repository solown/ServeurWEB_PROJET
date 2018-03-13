var text;


function update(){
	document.getElementsByClassName('resume')[0].style.display = 'none';
	document.getElementById('inputresume').style.display = 'block';
	document.getElementsByClassName('buttonupdate')[0].style.display = 'none';
	document.getElementsByClassName('buttonconfirm')[0].style.display = 'block';
}

function confirm(){
	text=document.getElementById('inputresume').value
	document.getElementsByClassName('resume')[0].innerHTML =  text;
	document.getElementById('inputresume').style.display = 'none';
	document.getElementsByClassName('resume')[0].style.display = 'block';
	document.getElementsByClassName('buttonconfirm')[0].style.display = 'none';
	document.getElementsByClassName('buttonupdate')[0].style.display = 'block';
	
}

function addpicture(){
	
}