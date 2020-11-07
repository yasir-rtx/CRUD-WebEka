<?php 
  $sqlm = mysqli_query($kon, "SELECT * FROM mahasiswa WHERE idmhs='$_GET[id]'");
  $rm = mysqli_fetch_array($sqlm);
 ?>

<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
 <input type="hidden" name="idmhs" value="<?php echo "$rm[idmhs]"; ?>">
  <p>
    <label for="nobp">Nobp :</label>
    <input name="nobp" type="text" id="nobp" placeholder="Nobp" value="<?php echo "$rm[nobp]"; ?>" disabled="disabled">
  </p>
  <p>
    <label for="nama">Nama :</label> 
    <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" value="<?php echo "$rm[nama]"; ?>">
  </p>
  <p>
  	<label for="select">Kelas : </label>
    <?php 
    	echo "<select name='kelas'>";
    		for ($i = 1; $i <= 3; $i++) {
    			if ($rm["kelas"] == "IF$i") {
    				$sel = "selected";
    				echo "<option value='IF$i' $sel>IF$i</option>";
    			}
    			else {
    				echo "<option value='IF$i'>IF$i</option>";
    			}
    		}
    	echo "</select>";
     ?>
  </p>
  <p>
    <label for="tmplahir">Tempat/</label>
    <label for="tgllahir">Tanggal Lahir : </label>
    <input type="text" name="tmplahir" id="tmplahir" placeholder="Tempat"  value="<?php echo "$rm[tmplahir]"; ?>"> / 
    <input type="date" name="tgllahir" id="tgllahir" placeholder="Tanggal"  value="<?php echo "$rm[tgllahir]"; ?>">
  </p>
  <?php 
  		if ($rm[jk] == "L") {
  			$l = "checked";
  		}
  		else if ($rm[jk] == "P") {
  			$p = "checked";
  		}
   ?>
  <p>
   	<label for="jk">Jenis Kelamin : </label>
    <input name="jk" type="radio" id="l" value="L" <?php echo "$l"; ?>>
    <label for="l">Laki-laki</label>
    <input type="radio" name="jk" id="p" value="P" <?php echo "$p"; ?>>
    <label for="p">Perempuan</label>
  </p>
  <p>
    <label for="alamat">Alamat : </label>
    <textarea name="alamat" id="alamat" placeholder="Alamat"><?php echo "$rm[alamat]" ?></textarea>
  </p>
  <p>
    <label for="hp">No Handphone :</label>
    <input type="text" name="hp" id="hp" placeholder="No Handphone" value="<?php echo "$rm[hp]"; ?>">
  </p>
  <p>
    <label for="email">Email :</label>
    <input type="text" name="email" id="email" placeholder="Email" value="<?php echo "$rm[email]"; ?>">
  </p>
  <?php 
  		echo "<img src='foto/$rm[foto]' width='100px'>";
   ?>
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
			$foto = ", foto='$nmfoto'";
		}
		else {
			$foto = "";
		}
		
		$sqlm = mysqli_query($kon, "UPDATE mahasiswa set nama='$_POST[nama]',
			kelas='$_POST[kelas]',
			tmplahir='$_POST[tmplahir]',
			tgllahir='$_POST[tgllahir]',
			jk='$_POST[jk]',
			alamat='$_POST[alamat]',
			hp='$_POST[hp]',
			email='$_POST[email]'
			$foto WHERE idmhs='$_POST[idmhs]'");
		
		if($sqlm){
			echo "Data Modified Succesfully";
		}
		else {
			echo "ERROR";
		}
		echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?p=mhs'>";
	}
 ?>