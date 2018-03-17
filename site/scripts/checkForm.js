(function(){function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s}return e})()({1:[function(require,module,exports){
"use strict";

function highlight(field, error) {
	if (error) field.style.backgroundColor = "#fba";else field.style.backgroundColor = "";
}

function checkMail(field) {
	var regex = /^[a-z]+\.[a-z]+[0-9]*$/;
	if (!regex.test(field.value)) {
		highlight(field, true);
		return false;
	} else {
		highlight(field, false);
		return true;
	}
}

function checkPassword(field) {
	if (field.value.length < 8) {
		highlight(field, true);
		return false;
	} else {
		highlight(field, false);
		return true;
	}
}

function checkForm(e) {

	var mailOk = checkMail(document.getElementById("mail"));
	var passwordOK = checkPassword(document.getElementById("password"));
	console.log(mailOk + passwordOK);
	if (passwordOK && mailOk) return;else {
		alert("8 caractères MINIMUM pour le mot de passe et veuillez entrer la partie gauche de votre adresse étudiante");
		e.preventDefault();
	}
}
},{}]},{},[1]);
