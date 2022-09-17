<?php 

	// connect to the database
	$conn = mysqli_connect('localhost', 'piethon', 'test1234', 'supreme_tacos');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>
