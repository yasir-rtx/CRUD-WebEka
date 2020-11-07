<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <p>
    <label for="nobp">Nobp :</label>
    <input type="text" name="nobp" id="nobp" placeholder="Nobp">
  </p>
  <p>
    <label for="nama">Nama :</label> 
    <input type="text" name="nama" id="nama" placeholder="Nama Lengkap">
  </p>
  <p>
    <label for="select">Kelas :</label>
    <select name="kelas" id="kelas">
      <option value="IF1">IF1</option>
      <option value="IF2">IF2</option>
      <option value="IF3">IF3</option>
    </select>
  </p>
  <p>
    <label for="tmplahir">Tempat/</label>
    <label for="tgllahir">Tanggal Lahir :</label>
    <input type="text" name="tmplahir" id="tmplahir" placeholder="Tempat"> / 
    <input type="date" name="tgllahir" id="tgllahir" Tanggal>
  </p>
  <p>
   	<label for="jk">Jenis Kelamin : </label>
    <input name="jk" type="radio" id="l" value="L">
    <label for="l">Laki-laki</label>
    <input type="radio" name="jk" id="p" value="P">
    <label for="p">Perempuan</label>
  </p>
  <p>
    <label for="alamat">Alamat :</label>
    <textarea name="alamat" id="alamat" placeholder="Alamat"></textarea>
  </p>
  <p>
    <label for="hp">No Handphone :</label>
    <input type="text" name="hp" id="hp" placeholder="No Handphone">
  </p>
  <p>
    <label for="email">Email :</label>
    <input type="text" name="email" id="email" placeholder="Email">
  </p>
  <p>
    <label for="foto">Foto :</label>
    <input type="file" name="foto" id="foto">
  </p>
  <p>
    <input name="simpan" type="submit" id="simpan" value="simpan data">
  </p>
</form>

<?php 
	if($_POST["simpan"]){
		include "koneksi.php";
		$nmfoto = $_FILES["foto"]["name"];
		$lokfoto = $_FILES["foto"]["tmp_name"];
		
		if(!empty($lokfoto)){
			move_uploaded_file($lokfoto, "foto/$nmfoto");
		}
		
		$sqlm = mysqli_query($kon, "insert into mahasiswa(nobp, nama, kelas, tmplahir, tgllahir, jk, alamat, hp, email, foto, tglsimpan) values('$_POST[nobp]','$_POST[nama]', '$_POST[kelas]', '$_POST[tmplahir]', '$_POST[tgllahir]', '$_POST[jk]', '$_POST[alamat]', '$_POST[hp]', '$_POST[email]', '$nmfoto', NOW())");
		
		if($sqlm){
			echo "Data Disimpan";
		}
		else {
			echo "Gagal Menyimpan";
		}
		echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=mhs'>";
	}
 ?>