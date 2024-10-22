<?php
	$mysqli = mysqli_connect("localhost", "yellow", "1234", "yellow");

	if (!$mysqli) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>