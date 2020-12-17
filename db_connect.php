<?php 
	$conn=mysqli_connect("localhost", "ARPITA", "ARPITA19", "bank");
	if(!$conn) {
		echo "Connection Error: " . mysqli_connect_error();
	}
?>