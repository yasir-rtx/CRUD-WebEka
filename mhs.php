<?php
	echo "<a href='?p=mhsadd'>Tambah Data Mahasiswa</a>";
	echo "<table width='100%' border='1' cellpadding='10' cellspacing='10'>
		<tr>
			<th>NO</th>
			<th>FOTO</th>
			<th>MAHASISWA</th>
			<th>DATA PERSONAL</th>
			<th>KONTAK</th>
			<th>AKSI</th>
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
				<a href='?p=mhsedit&id=$rm[idmhs]'>Ubah/</a>
				<a href='?p=mhsdel&id=$rm[idmhs]'>Hapus</a>
			</td>
		</tr>";
		$no++;
	}
	echo "</table>";
 ?>