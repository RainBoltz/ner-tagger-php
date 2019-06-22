<?php

$servername = "localhost";
$username = "root";
$password = "851123";
$database = "ctbcfx";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
	echo "jizz!";
    $conn->close();
	return;
}

?>