<link rel="stylesheet" type="text/css" href="style.css">

<h2>Data Pembelian</h2>
	<table>
		<tr>
			<th>No</th>
			<th>ID Barang</th>
			<th>Nama Barang</th>
			<th>Harga</th>
			<th>Ukuran</th>
			<th>Jumlah</th>
			<th>Total Harga</th>
			<th>Nama Pembeli</th>
			<th>Alamat</th>
			<th>Telepon</th>
			<th>Username</th>
		</tr>
			<?php
				include "koneksi.php";
				$query= "SELECT * FROM pembelian";
				$result= mysqli_query($connect, $query);
				$nomor=1;
				if(mysqli_num_rows($result) > 0){
					while ($row = mysqli_fetch_assoc($result)) {
			?>
		<tr>
			<td> <?php echo $nomor ?></td>
			<td> <?php echo $row["id_barang"]; ?> </td>
			<td> <?php echo $row["nama_barang"]; ?> </td>	
			<td>Rp <?php echo number_format($row["harga_barang"]); ?> </td>
			<td> <?php echo $row["ukuran"];?> </td>
			<td> <?php echo $row["jumlah"]; ?> </td>
			<td>Rp <?php echo number_format($row["total_harga"]); ?> </td>
			<td> <?php echo $row["nama_pembeli"]; ?> </td>
			<td> <?php echo $row["alamat_pembeli"]; ?> </td>
			<td> <?php echo $row["telepon_pembeli"]; ?> </td>
			<td> <?php echo $row["username_pembeli"]; ?> </td>
		</tr>
		<?php
				$nomor++;
				}			
			}else{
				echo "0 result";
			}
		?>
	</table>