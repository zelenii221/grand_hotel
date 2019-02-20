<?php 
	require 'include/connection.php';
	require 'include/function.php';
?>

<form method="POST">
	<p>Название: <input required type="text" name="name"></p>
	<p>Описание: <input required type="text" name="description"></p> 
	<p>Вместимость: <input required type="number" name="capacity"></p>
	<p>Цена за ночь: <input required type="number" name="price"></p>
	<p>Изображение 1: <input required type="text" name="image1"></p>
	<p>Изображение 2: <input required type="text" name="image2"></p>
	<p>Изображение 3: <input required type="text" name="image3"></p>
	<button type="submit" name="add">Добавить</button>
</form>

<?php 
	$data = $_POST;
	if(isset($data['add'])){
		add_room($data['name'], $data['description'], $data['capacity'], $data['price'], $data['image1'], $data['image2'], $data['image3']);
	}

?>