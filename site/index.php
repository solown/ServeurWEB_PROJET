<?php

$q = $_GET['q'];

if($q === '')
{
	$page = 'accueil';
}
else if($q === 'swipe'){
	$page = 'swipe';
}

include 'view/'.$page.'.html';
include 'view/'.$page.'.php';
