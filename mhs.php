<?php
	echo "<a href='?p=mhsadd'><img src='img/new.png' width='50px' height='50px'></a>";
	echo "<table width='100%' border='1' cellpadding='10' cellspacing='10'>
		<tr>
			<th>NO</th>
			<th>PHOTO</th>
			<th>MAHASISWA</th>
			<th>PERSONAL DATA</th>
			<th>CONTACT</th>
			<th>ACTION</th>
		</tr>";
	
	$sqlm = mysqli_query($kon, "SELECT* FROM mahasiswa order by tglsimpan desc");
	$no = 1;
	while($rm = mysqli_fetch_array($sqlm)){
		echo "
		<tr>
			<td>$no</td>
			<td><img src='foto/$rm[foto]' width='100px'</td>
			<td>
				Nobp : <b>$rm[nobp]</b><br>
				Nama : <b>$rm[nama]</b><br>
				Kelas : <b>$rm[kelas]</b><br>
				Terdaftar Sejak : <b>$rm[tglsimpan]</b>
			</td>
			<td>
				Tempat/Tanggal Lahir : <br>
				<b>$rm[tmplahir]/$rm[tgllahir]</b><br>
				Jenis Kelamin : <b>$rm[jk]</b>
			</td>
			<td>
				Alamat : <b>$rm[alamat]</b><br>
				No. Handphone : <b>$rm[hp]</b><br>
				Email : <b>$rm[email]</b>
			</td>
			<td>
				<a href='?p=mhsedit&id=$rm[idmhs]'><img src='img/edit.png' width='50px' height='50px'></a><hr>
				<a href='?p=mhsdel&id=$rm[idmhs]'><img src='img/delete.png' width='50px' height='50px'></a>
			</td>
		</tr>";
		$no++;
	}
	echo "</table>";
 ?>