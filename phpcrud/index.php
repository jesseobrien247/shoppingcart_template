<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/shoppingcart_template/phpcrud/includes/access.inc.php';

/*************************************************************
//Don't forget to change server path
/*************************************************************/

if (!userIsLoggedIn())
{
	include 'login.html.php';
	exit();
}

if (!userHasRole('admin'))
{
	$error = 'Only Admins may access this page.';
	include 'accessdenied.html.php';
	exit();
}

include 'read.php';
?>
