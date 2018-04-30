const edit = document.querySelector('.edit')
const confirm = document.querySelector('.confirm')
const cancel = document.querySelector('.cancel')
const newDescription = document.querySelector('.new_description')
const oldDescription = document.querySelector('.old_description')
const form = document.querySelector('#changeDescription')


edit.addEventListener('click', () => {
	edit.style.display = 'none'
	cancel.style.display = 'inline-block'
	confirm.style.display = 'inline-block'
	oldDescription.style.display = 'none'
	newDescription.style.display = 'block'
})
confirm.addEventListener('click', () => {
	edit.style.display = 'block'
	cancel.style.display = 'none'
	confirm.style.display = 'none'
	oldDescription.style.display = 'block'
	newDescription.style.display = 'none'
	form.submit();
})
cancel.addEventListener('click', () => {
	edit.style.display = 'block'
	cancel.style.display = 'none'
	confirm.style.display = 'none'
	oldDescription.style.display = 'block'
	newDescription.style.display = 'none'
	newDescription.value = ''

})
