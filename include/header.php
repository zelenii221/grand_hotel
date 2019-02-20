<?php 
	require 'connection.php';
	require 'function.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Отель name</title>
	<link rel="shortcut icon" href="img/icoico.ico">
	<meta http-equiv="Cache-Control" content="private">
	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script type="text/javascript" src="js/hide-seek.js"></script>
</head>
<body>
	<header>
		<div id="header_content">
			<div id="ico"><a href="../index.php"><img src="img/ico.svg", alt="ico"></a></div>
			<div id="menu"> 
				<!-- <p>Московский проспект, д. 4 <a href="tel:+7 909 111 22 33" class="phonenumber">+7 909 111 22 33</a></a></p> -->
				<a href="#">Пункт</a>
				<a href="#">Пункт</a>
				<a href="#">Галерея</a>
				<a href="#">Контакты</a>
			</div>
			<!-- <div id="sign">
				<a onclick="show('block', 'login')" id="signin">ВХОД</a>
				<a onclick="show('block', 'reg')">Регистрация</a>
			</div> -->
			<?php if (isset($_SESSION['logged_user'])) : ?>
				<img src="../img/icouser.svg">
				<div class="sign">
					<center><img src="../img/icouser.svg">
					<?php echo $_SESSION['logged_user']?></center>
					<!-- Вы вошли как : <a href="/cabinet.php?user_id=<?= $_SESSION['logged_user']?>"><?php echo $_SESSION['logged_user']?></a>
					<a href="include/logout.php"> выйти </a> -->
				
					<div id="user_block">
						<ul>
							<li><a href="/cabinet.php?user_id=<?= $_SESSION['logged_user']?>">Кабинет</a></li>
							<li><a href="/orders.php?user_id=<?= $_SESSION['logged_user']?>">Заказы</a></li>
							<hr>
							<li><a href="include/logout.php">Выйти</a></li>
						</ul>
					</div>
				</div> 
				<?php else: ?>
					<div class="sign">
						<a onclick="show('block', 'login')" id="signin">ВХОД</a>
						<a onclick="show('block', 'reg')">Регистрация</a>
					</div>
				<?php endif; ?> 
		</div>
	</header>
