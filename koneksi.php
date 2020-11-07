<?php 
	$host = "localhost";	//Berisi IP Address dari server
	$user = "root";			//berisi username yang diberikan penyedia hosting
	$pass = ""; 			//berisi password yang diberikan penyedia hosting
	$db = "db_crud"; //nama database yang diakses

	$kon = mysqli_connect($host, $user, $pass, $db);

	//Test connection
	// if ($kon) {
	// 	echo "Terkoneksi dengan MySQL server <br>";
	// 	echo "Database $db bisa diakses";
	// } else {
	// 	echo "Connection Failed";
	// }
 ?>