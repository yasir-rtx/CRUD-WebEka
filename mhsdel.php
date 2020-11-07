<?php 
	$sqlm = mysqli_query($kon, "DELETE FROM mahasiswa WHERE idmhs='$_GET[id]'");

	if ($sqlm) {
		echo "Data Deleted Succesfully";
	}
	else {
		echo "ERROR";
	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=mhs'>";
 ?>