<?php include("include/header.php"); ?>
<?php include("include/registration.php"); ?>
<?php include("include/login.php"); ?>
<?php 
	$data = $_POST;
	if(isset($data['check'])){
		$check_in = $data['check_in'];
		$check_out = $data['check_out'];
		$capacity = $data['capacity'];
		if (check_date($check_in) && check_date($check_out) && check_capacity($capacity)/* && $check_in < $check_out*/){
			echo "<script>document.location.replace('rooms.php?check_in=".$check_in."&check_out=".$check_out."&capacity=".$capacity."');</script>";
		}
	}

?>



	<content>
		<div id="check">
			<div>
				<center>Проверить номер:</center>
				<form method="POST">
					<p>Заезд: <input required type="date" name="check_in" class="form-control" value="<?php echo @$data['check_in']; ?>"></p>
					<p>Выезд: <input required type="date" name="check_out" class="form-control" value="<?php echo @$data['check_out']; ?>"></p>
					<p>Количество людей: <input required type="number" name="capacity" class="form-control" value="<?php echo @$data['capacity']; ?>"></p>
					<p><button type="submit" name="check" class="btn btn-success">Проверить</button></p>
				</form>

			</div>
		</div>

	</content>
<?php include("include/footer.php"); ?>