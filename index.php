<?php

session_start();

if(isset($_SESSION['nip'])) {
	header("location: menu1_operator.php");
}

include("includes/Template.class.php");

$data = null;
if(isset($_COOKIE['message'])) {
	$data .= "<div class='row alert alert-danger alert-dismissible fade show' role='alert'>
				<strong>" . $_COOKIE['message'] . "</strong>
				<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
		  	  </div>";
}

$tpl = new Template("templates/login.html");
$tpl->replace("ERROR_LOGIN", $data);
$tpl->write();