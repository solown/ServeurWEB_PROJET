var text;


function update(){
	document.getElementsByClassName('resume')[0].style.display = 'none';
	document.getElementById('inputresume').style.display = 'block';
	document.getElementsByClassName('buttonupdate')[0].style.display = 'none';
	document.getElementsByClassName('buttonconfirm')[0].style.display = 'block';
	document.getElementById('textarea_feedback').display = 'block';
}

function confirm(){
	text=document.getElementById('inputresume').value
	document.getElementsByClassName('resume')[0].innerHTML =  text;
	document.getElementById('inputresume').style.display = 'none';
	document.getElementsByClassName('resume')[0].style.display = 'block';
	document.getElementsByClassName('buttonconfirm')[0].style.display = 'none';
	document.getElementsByClassName('buttonupdate')[0].style.display = 'block';
	document.getElementById('textarea_feedback').display = 'none';
}
$('textarea').autoResize();

$(document).ready(function() {
    var text_max = 99;
    $('#textarea_feedback').html(text_max + ' characters remaining');

    $('#textarea').keyup(function() {
        var text_length = $('#textarea').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' characters remaining');
    });
});

