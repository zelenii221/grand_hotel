<?php include("include/header.php"); ?>
<?php include("include/registration.php"); ?>
<?php include("include/login.php"); ?>
<?php $user_rooms = get_user_rooms($db, $_SESSION['logged_user']); 
?>
<content>
	<h2>Ваши номера:</h2>
<?php foreach($user_rooms as $room):?>
	
		<div class="room_block">
			<form method="POST">
				<?php $images = get_img($room['room']);?>
				<img src="img/<?=$images[1]['room_id_img'] ?>"/>
				<div class="room_info">
					<p><?=$room['name']?></p>
					<p>Количество мест: <?=$room['capacity']?></p>
					<p>Описание: <?=$room['description']?></p>
					<p>Въезд: <?=$room['check_in']?></p>
					<p>Выезд: <?=$room['check_out']?></p>
				</div>
				<div class="price">
					<p>Стоимость: <?=(date_difference($room['check_in'],$room['check_out'])['dif'] + 1) * $room['price']?></p>
					<button type="submit" name="<?=$room['room']?>" class="btn btn-success">Удалить заказ</button>
				</div>
			</form>
		</div>



<?php
	
	$data = $_POST;
	$id_room = $room['room'];
	if(isset($data[$room['room']])){
		// $id_room = $room['id'];
		$check_in = $room['check_in'];
		$check_out = $room['check_out'];
		$logged_user = $_SESSION['logged_user'];
		$price = (date_difference($check_in, $check_out)['dif'] + 1) * $room['price'];
		del_reserv($check_in, $check_out, $logged_user, $id_room, $price);
		echo "Номер удален";
		var_dump($price);
	}

?>

<?php endforeach; ?>
</content>
<?php include("include/footer.php"); ?>