<link rel="stylesheet" type="text/css" href="style.css">

<h2>Data Barang</h2>
<div style="margin-bottom: 10px;">
	<a href="admin.php?halaman=tambahproduk" class="tombol-biru">Tambah Data</a>
</div>
<div class="isi">

	<table>
		<tr>
			<th>Id Barang</th>
			<th>Nama</th>
			<th>Jenis</th>
			<th>Harga</th>
			<th>Gambar</th>
			<th>Aksi</th>
		</tr>
		<?php
		include "koneksi.php";
		$query = "SELECT * FROM produk";
		$result = mysqli_query($connect, $query);
		?>
		<?php while ($row = mysqli_fetch_assoc($result)) { ?>
			<tr>
				<td> <?php echo $row["id_barang"]; ?> </td>
				<td> <?php echo $row["nama_barang"]; ?> </td>
				<td> <?php echo $row["jenis_barang"]; ?> </td>
				<td>Rp <?php echo number_format($row["harga_barang"]); ?> </td>
				<td>
					<img src="<?php echo $row['gambar_barang'] ?>" width="100">
				</td>
				<td>
					<a href="admin_index.php?halaman=hapusproduk&id=<?php echo $row['id_barang']; ?>" class="tombol-merah" onclick="return confirm('Anda Yakin Ingin Menghapus?')">Hapus</a>
				</td>
			</tr>
		<?php	} ?>

	</table>
</div>