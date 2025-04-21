<?php
	session_start();
	unset($_SESSION['username']);
	unset($_SESSION['firstname']);
	unset($_SESSION['lastname']);
	unset($_SESSION['role']);
	unset($_SESSION['employee_code']);
	unset($_SESSION['id']);
	session_destroy();
	header('Location: index.php');
?>