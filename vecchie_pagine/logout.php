<?php
	@session_start();
	unset($_SESSION['ut']);
	echo "sto per cancellare la sessione";
	$_SESSION = array();
	session_destroy();
	echo"......................cancellata";
	@header("location:index.php");
?>
