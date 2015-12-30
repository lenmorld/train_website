<?php 

function setUpConnection() {
	
	//establish connection with server by passing server_name, username and password as a parameter
		
	$servername = "localhost";
	$username = "lenmor";
	$password = "markoj2049";
	$dbname = "train";
	
		// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	return $conn;
}



		

?>