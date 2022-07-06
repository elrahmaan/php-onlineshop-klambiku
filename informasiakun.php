<?php
	include "koneksi.php";
?>
<style type="text/css">
	.tombol-biru{
		margin-top: 20px;
		color: #fff;
	  	background-color: #428bca;
	  	border-color: #357ebd;
	  	padding: 7px;
	 	border-radius: 5px;
	  	text-decoration: none;
	  	cursor: pointer;
	}
	.tombol-merah{
		color: #fff;
	  	background-color: #d9534f;
	  	border-color: #d43f3a;
	  	padding: 7px;
	  	border-radius: 5px;
	  	text-decoration: none;
	  	cursor: pointer;
	}
	button{
		cursor: pointer;
	}
	.itemform{
		margin-bottom: 15px;
	}
	.form{
		display: block;
	  	width: 100%;
	  	height: 34px;
		padding: 6px 12px;
		font-size: 14px;
		line-height: 1.42857143;
		color: #555;
		background-color: #fff;
		background-image: none;
		border: 1px solid #ccc;
		border-radius: 4px;
	}
	tr: nth-child(even){
		background-color: #f2f2f2;
	}
</style>
<div style="padding: 70px 500px 50px 380px;  ">
	<div style="background: #DFDFDF; width: 600px; padding: 10px 10px 10px 10px; border-radius: 5px;">
		<div style="">
			<h1 align="center" style="font-family: sans-serif;">Informasi Akun</h1>
			<h3 align="center">Data Pribadi</h3>
			<form method="post" enctype="multipart/form-data">
				<div class="itemform">
					<label>Username</label><br>
					<a class="form" name="username" style="width: 95%; height: 16px; padding-top: 9px; padding-bottom: 9px;"><?php echo $_SESSION["user"]["username"]; ?></a>
				</div>
				<div class="itemform">
					<label>Password</label>
					
					<a class="form" name="password" style="width: 95%; height: 16px; padding-top: 9px; padding-bottom: 9px;"><?php echo $_SESSION["user"]["password"]; ?></a>
				</div>
				<div class="itemform">
					<label>Email</label>
					
					<a class="form" name="email" style="width: 95%; height: 16px; padding-top: 9px; padding-bottom: 9px;"><?php echo $_SESSION["user"]["email"]; ?></a>
				</div>
				<div class="itemform">
					<label>No Telepon</label>
					<a class="form" name="no_telepon" style="width: 95%; height: 16px; padding-top: 9px; padding-bottom: 9px;"><?php echo $_SESSION["user"]["no_telepon"]; ?></a>
				</div>
				<?php 
				$akun = $_SESSION["user"]["username"];
				?>
				<a href="user.php?id=<?php echo $akun ;?>&halaman=editAkun"  class="tombol-biru">EDIT</a>
			</form>
			<h3 align="center">History Transaksi</h3>
			<div class="itemform">
				<table style="border-collapse: collapse;border-spacing: 0;width: 95%;margin-bottom: 20px;">
					<tr style="text-align: left;padding: 14px; border:1px solid grey; border-right: 1px solid grey;">
						<th>No</th>
						<th>Username</th>
						<th>Barang Yang dibeli</th>
						<th>Jumlah</th>
						<th>Total Harga</th>
						<th>Tanggal Beli</th>
					</tr>
					<?php
						
						$query= "SELECT * FROM pembelian WHERE username_pembeli='$akun'";
						$result= mysqli_query($connect, $query);
						$nomor = 1;
					if(mysqli_num_rows($result) > 0){	
							while ($row = mysqli_fetch_assoc($result)) { 
								?>
					<tr align="center" style="text-align: left;padding: 14px;">
						<td> <?php echo $nomor?></td>
						<td> <?php echo $row["username_pembeli"]; ?> </td>
						<td> <?php echo $row["nama_barang"]; ?> </td>
						<td> <?php echo $row["jumlah"]; ?> </td>
						<td>Rp <?php echo number_format($row["total_harga"]); ?> </td>
						<td> <?php echo $row["tanggal"]; ?> </td>
					</tr>
					<?php
						$nomor++;	
			 				}
			 		} 
			 		?>
				</table>
			
			<a href="user.php"  class="tombol-merah"> KEMBALI</a>	
			</div>		
		</div>
	</div>		
</div>