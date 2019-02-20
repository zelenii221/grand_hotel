<?php 
	
	$data = $_POST;
	if(isset($data['register'])){

		$errors = array();
		if(trim($data['login']) == ''){
			$errors[] = 'Введите логин!';
		}
		if(trim($data['email']) == ''){
			$errors[] = 'Введите email!';
		}
		if($data['password'] == ''){
			$errors[] = 'Введите пароль!';
		}
		if($data['password_2'] != $data['password']){
			$errors[] = 'Повторный пароль введён не верно!';
		}

		$login = $data['login'];

		if(search_login($login)){
			$errors[] = 'Такой логин уже существует!';
		}

		$email = $data['email'];

		if(search_email($email)){
			$errors[] = 'Такой email уже существует!';
		}

		if(empty($errors)){

			$login = $data['login'];
			$email = $data['email'];
			$password = password_hash($data['password'],PASSWORD_DEFAULT);
			
			insert_user($login ,$email ,$password);

			echo '<div style="color: green;">Вы успешно зарегистрировались!</div><hr>';
			
		}
		else{
			echo '<div style="color: red">'.array_shift($errors).'</div><hr>';
		}
	}
?>



<div class="background_registration" onclick="show('none', 'reg'), show('none', 'login')"></div>
<div class="registration" id="reg">
	<p>Регистрация:</p>
	<form action="index.php" method="POST">
		<p>Логин: <input required type="text" name="login" class="form-control" value="<?php echo @$data['login']; ?>"></p>
		<p>Пароль: <input required type="password" name="password" class="form-control" value="<?php echo @$data['password']; ?>"></p>
		<p>Пароль2: <input required type="password" name="password_2" class="form-control" value="<?php echo @$data['password_2']; ?>"></p>
		<p>Почта: <input required type="email" name="email" class="form-control" value="<?php echo @$data['email']; ?>"></p>
		<p><button type="submit" name="register" class="btn btn-success">Зарегестрироваться</button></p>
	</form>
</div>
