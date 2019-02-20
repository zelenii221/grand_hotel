<?php $rooms = get_rooms($db, $_GET['capacity'], $_GET['check_in'], $_GET['check_out']); ?>



<h2>Номера:</h2>
<?php foreach($rooms as $room):?>

	<div class="room_block">
		<form method="POST">
			<img src="img/room.jpg">
			<div class="room_info">
				<p><?=$room['name']?></p>
				<p>Количество мест: <?=$room['capacity']?></p>
				<p>Описание: <?=$room['description']?></p>
			</div>
			<div class="price">
				<p>От <?=$room['price']?> за ночь</p>
				
					<button type="submit" name="<?=$room['room']?>" class="btn btn-success">Зарезервировать</button>
				
			</div>
		</form>

	</div>

<?php
	
	$data = $_POST;
	$id_room = $room['room'];
	if(isset($data[$room['room']])){
		// $id_room = $room['id'];
		$check_in = $_GET['check_in'];
		$check_out = $_GET['check_out'];
		$logged_user = $_SESSION['logged_user'];
		$price = (date_difference($check_in, $check_out)['dif'] + 1) * $room['price'];
		set_reserv($check_in, $check_out, $logged_user, $id_room, $price);
		echo "Номер зарезервирован";
		echo "$price";
		var_dump($price);
	}

?>


<?php endforeach; ?>