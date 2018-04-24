var text;


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
$("#inputresume").height( $("#inputresume").scrollHeight );
/*var input = document.getElementsById('inputresume');

input.onkeypress = input.onkeydown = function() {
    this.size = ( this.value.length > 10 ) ? this.value.length : 10;
};

/*$('textarea').keyup(function (e) {
    var rows = $(this).val().split("\n");
    $(this).prop('rows', rows.length);
});

/*var tx = document.getElementsByTagName('textarea');
for (var i = 0; i < tx.length; i++) {
  tx[i].setAttribute('style', 'height:' + (tx[i].scrollHeight) + 'px;overflow-y:hidden;');
  tx[i].addEventListener("input", OnInput, false);
}

function OnInput() {
  this.style.height = 'auto';
  this.style.height = (this.scrollHeight) + 'px';
}

$(document).ready(function() {
    var text_max = 280;
    $('#textarea_feedback').html(text_max + ' characters remaining');

    $('#textarea').keyup(function() {
        var text_length = $('#textarea').val().length;
        var text_remaining = text_max - text_length;

        $('#textarea_feedback').html(text_remaining + ' characters remaining');
    });
});*/

