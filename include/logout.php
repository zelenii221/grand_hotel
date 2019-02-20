<?php
	require_once 'connection.php';
	unset($_SESSION['logged_user']);
	session_destroy();
	header('location: ..');
?>