<?php

$email =filter_input(INPUT_POST, 'email');
$passwordHash =filter_input(INPUT_POST, 'passwordHash');
$fname =filter_input(INPUT_POST, 'fname');
$lname =filter_input(INPUT_POST, 'lname');
if (!empty($email)){
	if (!empty($passwordHash)){
		$host = "localhost";
		$dbusername = "root";
		$dbpassword = "";
		$dbname = "tester";

		$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

		if (mysqli_connect_error()){
			die('Connect Error ('. mysqli_connect_errno() .') ' . mysqli_connect_error());
		}
		else{
			$sql = "INSERT INTO login (email, passwordHash, fname, lname)
			values ('$email' , '$passwordHash' , '$fname' , '$lname')";
			if ($conn->query($sql)){
				echo "New record is inserted successfully";
			}
			else{
				echo "Error: ". $sql ."<br>". $conn->error;
			}
			$conn->close();
		}
	}
	else{
		echo "Password should not be empty";
		die();
	}
}
else{
	echo "Username should not be empty";
	die();
}
?>
