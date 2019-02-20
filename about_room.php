<?php include("include/header.php"); ?>
<?php include("include/registration.php"); ?>
<?php include("include/login.php"); ?>

<content>
<?php $rooms = get_all_rooms($_GET['room']);
	foreach($rooms as $room):
?>

	<div class="room_block_about">	
		<div class="img_block">
			<?php $images = get_img($room['id']); foreach($images as $image) :?>
				<img src="img/<?=$image['room_id_img'] ?>"/>
			<?php endforeach; ?>
		</div>
		<div class="room_info">
			<p><?=$room['name']?></p>
			<p>Количество мест: <?=$room['capacity']?></p>
			<p>Описание: <?=$room['description']?></p>
		</div>
		<div class="price">
			<p>От <?=$room['price']?> за ночь</p>
		</div>

	</div>

<?php endforeach; ?>
</content>
<?php include("include/footer.php"); ?>