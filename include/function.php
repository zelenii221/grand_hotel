<?php
	function get_rooms($db, $capacity, $check_in, $check_out){
		// $sql = "SELECT * FROM rooms JOIN reservation ON rooms.id=reservation.room";

		$sql = "SELECT * 
		FROM rooms JOIN reservation ON rooms.id=reservation.room 
		WHERE rooms.capacity>=$capacity
		AND NOT reservation.room = ANY (SELECT room FROM reservation WHERE('$check_in' BETWEEN check_in AND check_out) OR ('$check_out' BETWEEN check_in AND check_out)) 
		GROUP BY rooms.id";


		$result = mysqli_query($db, $sql);
		// var_dump($result);
		$rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $rooms;
	}

	function get_user_rooms($db, $user){
		$sql = "SELECT * 
		FROM rooms JOIN reservation ON rooms.id=reservation.room
		WHERE reservation.tenant = '$user'";
		$result = mysqli_query($db, $sql);
		// var_dump($result);
		$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $users;
	}
	// $rooms = get_rooms($db);

	function set_reserv($check_in, $check_out, $tenant, $room, $price)
	{
		global $db;

		$insert_query = "INSERT INTO reservation (check_in, check_out, tenant, room, total_price) VALUES ('$check_in', '$check_out', '$tenant', '$room', '$price')";

		$result = mysqli_query($db, $insert_query);
	}


	function check_reserv($check_in, $check_out){
		global $db;

		$sql = "SELECT id
		FROM reservation
		WHERE $check_in<>check_in AND $check_out<>check_out";

		$result = mysqli_query($db, $sql);

		return  mysqli_fetch_assoc($result);
	}

	function date_difference($date1, $date2){
		global $db;

		$sql = "SELECT DateDiff('$date2','$date1') AS 'dif'";

		$result = mysqli_query($db, $sql);

		return  mysqli_fetch_assoc($result);
	}

	function insert_user($login ,$email,$password){
		global $db;

		$insert_query = "INSERT INTO users (login, password, email) VALUES ('$login', '$password', '$email')";

		$result = mysqli_query($db, $insert_query);
	}

	function search_login($login){
		global $db;

		$search_query = 'SELECT Login FROM users WHERE Login = "'.$login.'"';

		$result = mysqli_query($db, $search_query);

		$result_1 = mysqli_fetch_assoc($result);

		return $result_1;
	}

	function search_password_by_Login($login){
		global $db;

		$search_query = "SELECT password FROM users WHERE login = '$login'";

		$result = implode (mysqli_fetch_assoc(mysqli_query($db, $search_query)));

		return $result;
	}

	function search_group_by_Login($login){
		global $db;

		$search_query = "SELECT role FROM users WHERE login = '$login'";

		$result = implode (mysqli_fetch_assoc(mysqli_query($db, $search_query)));

		return $result;
	}

	function count_category_id(){
		

		$sql = 'SELECT COUNT(*) FROM Id.COLUMNS WHERE table_catalog = "library" AND table_name = "categories"';

		$result = mysqli_query($db, $sql);

		return $result;
	}

	function search_email($email){
		global $db;

		$search_query = 'SELECT email FROM users WHERE email = "'.$email.'"';

		$result = mysqli_fetch_assoc(mysqli_query($db, $search_query));

		return $result;
	}

	function check_date($date){
		global $db;

		$sql = "SELECT rooms.id
		FROM rooms JOIN reservation ON rooms.id=reservation.room 
		WHERE NOT reservation.room = ANY (SELECT room FROM reservation WHERE('$date' BETWEEN check_in AND check_out))";

		$result = mysqli_query($db, $sql);

		return  mysqli_fetch_assoc($result);
	}

	function check_capacity($capacity){
		global $db;

		$sql = "SELECT capacity FROM rooms WHERE '$capacity' <= capacity";

		$result = mysqli_query($db, $sql);

		return  mysqli_fetch_assoc($result);
	}

	function insert_subscriber($email) {
    global $bd;
    
    $email = mysqli_real_escape_string($bd, $email);
    //1. Проверить есть ли подписчик в таблице subscribers
    $query = "SELECT * FROM subscribers WHERE Email = '$email'";
    
    $result = mysqli_query($bd, $query);
    
    if (!mysqli_num_rows($result)) {
        //2. Если его нет, то создаем подписчика с уникальным кодом (неактивного)
        $subscriber_code = generate_code();
        
        $insert_query = "INSERT INTO subscribers (Email, Code) VALUES ('$email', '$subscriber_code')";
        
        $result = mysqli_query($bd, $insert_query);
        
        if ($result) {
            return 'created';
        } else {
            return 'fail';
        }
        
    } else {
        return 'exist';
    }
     
	}
?>