<?php



$q = $_GET['q'];

if($q === '')
{
	$page = "accueil";
}
else if($q === 'swipe'){
	$page = "swipe";
}

include 'views/'.$page.'.html';
include 'views/'.$page.'.php';
