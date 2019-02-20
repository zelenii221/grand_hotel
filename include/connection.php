<?php
	$db = mysqli_connect("localhost","root","","hotel");
	$db->set_charset("utf8");
	if(mysqli_connect_errno()){
		echo 'Ошибка в подключении к базе данных ('.mysqli_connect_errno.'): '.mysqli_connect_error();
		exit();
	}
	session_start();	
?>