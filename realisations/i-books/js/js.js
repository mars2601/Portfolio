

function confirmDelete(){
	alert('deleteButton');
}

function init(){
	var deleteButton = document.getElementsByClassName('delete');

	deleteButton.addEventListener("click", confirmDelete, false);
}

window.addEventListener("load", init, false);