'use strict';

var $ = document.querySelector.bind(document);
var form = $('form');
var changeFormState = function changeFormState() {
	var input = $('input');
	form.classList.toggle('open');
	if (form.className === 'open') input.focus();else input.value = '';
};
form.addEventListener('click', changeFormState);
form.addEventListener('submit', function (e) {
	e.preventDefault();
	changeFormState();
});