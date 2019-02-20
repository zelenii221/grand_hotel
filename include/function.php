
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

	function get_all_rooms($room){
		global $db;

		$sql = "SELECT * 
		FROM rooms 
		WHERE '$room' = id";
		$result = mysqli_query($db, $sql);
		// var_dump($result);
		$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $users;

	}

	function get_img($room){
		global $db;

		$sql = "SELECT room_id_img
		FROM room_images
		WHERE room_id = '$room'";

		$result = mysqli_query($db, $sql);
		// var_dump($result);
		$images = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $images;
	}
	// $rooms = get_rooms($db);

	function set_reserv($check_in, $check_out, $tenant, $room, $price)
	{
		global $db;

		$insert_query = "INSERT INTO reservation (check_in, check_out, tenant, room, total_price) VALUES ('$check_in', '$check_out', '$tenant', '$room', '$price')";

		$result = mysqli_query($db, $insert_query);
	}

	function del_reserv($check_in, $check_out, $tenant, $room, $price){
		global $db;

		$insert_query = "DELETE FROM reservation WHERE check_in='$check_in' AND check_out='$check_out' AND tenant='$tenant' AND room='$room' AND total_price='$price'";

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

	function check_admin($name){

		global $db;

		$sql = "SELECT id
		FROM users
		WHERE login = '$name' AND role = 'admin'";

		$result = mysqli_query($db, $sql);

		return  mysqli_fetch_assoc($result);
	}

	function do_sql($zapr){
		global $db;

		$sql = "$zapr";

		var_dump($sql);

		$result = mysqli_query($db, $sql);
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

	function add_room($name, $description, $capacity, $price, $image1, $image2, $image3){
		global $db;

		$sql = "INSERT INTO rooms (name, capacity, description, price) VALUES ('$name', '$capacity', '$description', '$price')";

		mysqli_query($db, $sql);
		add_room2($image1, $image2, $image, $temp);

	}

	function add_room2($image1, $image2, $image3, $temp){
		global $db;	
		$temp = mysqli_fetch_assoc(mysqli_query($db, "SELECT MAX(id) FROM rooms"))['MAX(id)']; 
		$sql2 = "INSERT INTO room_images (room_id, room_id_img) VALUES ($temp, '$image1')";
		$sql3 = "INSERT INTO room_images (room_id, room_id_img) VALUES ($temp, '$image2')";
		$sql4 = "INSERT INTO room_images (room_id, room_id_img) VALUES ($temp, '$image3')";
		$sql5 = "INSERT INTO reservation (check_in, check_out, tenant, room, total_price) VALUES ('2000-05-05','2000-05-05','0','$temp','0')";	
		var_dump($temp);
		// mysqli_query($db, $sql);
		mysqli_query($db, $sql2);
		mysqli_query($db, $sql3);
		mysqli_query($db, $sql3);
		mysqli_query($db, $sql4);
		mysqli_query($db, $sql5);
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