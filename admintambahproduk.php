<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<form method="post" enctype="multipart/form-data">
	<div class="itemform">
		<label>Id Barang</label>
		<input type="text" class="form" name="id">
	</div>
	<div class="itemform">
		<label>Nama</label>
		<input type="text" class="form" name="nama">
	</div>
	<div class="itemform">
		<label>Jenis</label>
		<input type="text" class="form" name="jenis">
	</div>
	<div class="itemform">
		<label>Harga (Rp)</label>
		<input type="number" class="form" name="harga">
	</div>
	<div class="itemform">
		<label>Gambar</label>
		<input type="file" class="form" name="gambar">
	</div>
	<input type="submit" class="tombol-biru" name="tambah" value="Tambahkan">
</form>

<?php
if(isset($_POST['tambah'])){
	include "koneksi.php";
	$target_path = "uploads/";

	$target_path = $target_path.basename($_FILES['gambar']['name']);

	move_uploaded_file($_FILES['gambar']['tmp_name'],$target_path);
	$query = ("INSERT INTO produk
		(id_barang,nama_barang,jenis_barang,harga_barang,gambar_barang)
		VALUES('$_POST[id]','$_POST[nama]','$_POST[jenis]','$_POST[harga]','$target_path')");
	mysqli_query($connect, $query);

	echo "<script>alert('Data Berhasil Ditambahkan')</script>";
	echo "<script>location='admin.php?halaman=produk';</script>";
}
?>
</body>
</html>
