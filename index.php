<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Project CRUD Mahasiswa</title>
</head>
<body>
	<h1>PROJECT CRUD DATA MAHASISWA</h1>

	<?php 
		include "koneksi.php";
		if ($_GET["p"] == "mhsadd") {
			include "mhsadd.php";
		} else if ($_GET["p"] == "mhsedit") {
			include "mhsedit.php";
		} elseif ($_GET["p"] == "mhsdel") {
			include "mhsdel.php";
		} else {
			include "mhs.php";
		}
	 ?>

</body>
</html>