<?php
	$mysqli = mysqli_connect("localhost", "caco26i", "",  "c9");
	if ($mysqli->connect_errno) {
        printf("Falló la conexión: %s\n", $mysqli->connect_error);
        exit();
    }
?>