<link rel="stylesheet" type="text/css" href="style.css">

<h2>Data Pengguna</h2>
	<table>
		<tr>
			<th>No</th>
			<th>Username</th>
			<th>Password</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Saldo</th>
			<th>Aksi</th>
		</tr>
			<?php
				include "koneksi.php";
				$query = "SELECT * FROM user WHERE level=2";
				$result= mysqli_query($connect, $query);
				$nomor = 1;
				if(mysqli_num_rows($result) > 0){
					while ($row = mysqli_fetch_assoc($result)) {						
			?>
		<tr>
			<td> <?php echo $nomor ?></td>
			<td> <?php echo $row["username"]; ?> </td>
			<td> <?php echo $row["password"]; ?> </td>
			<td> <?php echo $row["email"]; ?> </td>
			<td> <?php echo $row["no_telepon"]; ?> </td>
			<td>Rp <?php echo number_format($row["saldo_user"]); ?> </td>
			<td>
				<a href="admin.php?halaman=hapusakun&id=<?php echo $row['username']; ?>" class="tombol-merah"onclick="return confirm('Anda Yakin Ingin Menghapus?')">Hapus</a>
			</td>
		</tr>
		<?php
				$nomor++;	
					}
				}else{
					echo "0 result";
				}
		?>
	</table>
	