<?php include("include/header.php"); ?>
<?php include("include/registration.php"); ?>
<?php include("include/login.php"); ?>
<?php $user_rooms = get_user_rooms($db, $_SESSION['logged_user']); 
?>
<content>
	<h2>Ваши номера:</h2>
<?php foreach($user_rooms as $room):?>
	
		<div class="room_block">
			<img src="img/room.jpg">
			<div class="room_info">
				<p><?=$room['name']?></p>
				<p>Количество мест: <?=$room['capacity']?></p>
				<p>Описание: <?=$room['description']?></p>
				<p>Въезд: <?=$room['check_in']?></p>
				<p>Выезд: <?=$room['check_out']?></p>
			</div>
			<div class="price">
				<p>Стоимость: <?=$room['price']?></p>
				
			</div>
		</div>
	
<?php endforeach; ?>
</content>