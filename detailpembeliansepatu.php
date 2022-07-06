<?php
	 include "koneksi.php";
?>
<style type="text/css">
	body{
		background: url(pic4.jpg);
	}
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
</style>
<?php
	 $id_produk = $_GET['id'];
	$query="SELECT * FROM produk WHERE id_barang='$id_produk'";
	$result= mysqli_query($connect, $query);	 
	 if(mysqli_num_rows($result) > 0){
		 while ($row = mysqli_fetch_assoc($result)){
			?>
		<div style="margin: 50px 500px 50px 380px; background: #DFDFDF; width: 600px; padding: 10px 10px 10px 10px; border-radius: 5px;">
			<div style="margin: 50px 50px 50px 50px;">
				<h1 align="center" style="font-family: sans-serif;">DETAIL PEMBELIAN</h1>
				<h3 align="center">Data Barang</h3>
				<img  src="<?php echo $row['gambar_barang'];?>" width="200" style="margin-left: 150px ; border:1px solid darkgrey;">
				<form method="post" enctype="multipart/form-data">
					<div class="itemform">
						<label>Id Barang</label><br>
						<a class="form" name="id_barang" style="width: 95%; height: 16px; padding-top: 9px; padding-bottom: 9px;"><?php echo $row["id_barang"]; ?></a>
					</div>
					<div class="itemform">
						<label>Nama Barang</label>
						<a class="form" name="nama_barang" style="width: 95%; height: 16px; padding-top: 9px; padding-bottom: 9px;"><?php echo $row["nama_barang"]; ?></a>
					</div>
					<div class="itemform">
						<label>Harga Barang</label>
						<a class="form" name="harga_barang" style="width: 95%; height: 16px; padding-top: 9px; padding-bottom: 9px;">Rp <?php echo number_format($row["harga_barang"]); ?></a>
					</div>
					<div class="itemform">
						<label>Ukuran</label>
						<select class="form" name="ukuran" size="1" style="width: 90px; height: 30px; ">
							<option value="38">38</option>
							<option value="39">39</option>
							<option value="40" selected>40</option>
							<option value="41">41</option>
							<option value="42">42</option>
							<option value="43">43</option>
							<option value="44">44</option>
						</select>
					</div>
					<div class="itemform">
						<label>Jumlah</label>
						<input type="number" class="form" name="jumlah">
					</div>
				<h3 align="center">Data Pembeli</h3>
					<div class="itemform">
						<label>Nama Pembeli</label>
						<input type="text" class="form" name="nama_pembeli">
					</div>
					<div class="itemform">
						<label>Alamat</label><br>
						<textarea class="form" name="alamat" rows="10" style="width: 100%; height: 50px;"></textarea>
					</div>
					<input type="submit" class="tombol-biru" name="beli" value="KONFIRMASI" onclick="return confirm('Anda Yakin Ingin Membeli?')">
					<input type="submit" class="tombol-merah" name="batal" value="BATAL" onclick="return confirm('Anda Yakin Ingin Membatalkan?')">
				</form>
			</div>
		</div>		
		<?php
		if(isset($_POST['beli'])){
			$id_barang = $row['id_barang'];
			$nama_barang = $row['nama_barang'];
			$harga_barang = $row['harga_barang'];
			$ukuran = $_POST['ukuran'];
			$jumlah = $_POST['jumlah'];
			$total = $harga_barang*$jumlah;
			$nama_pembeli = $_POST['nama_pembeli'];
			$alamat = $_POST['alamat'];
			$telepon = $_SESSION['user']['no_telepon'];
			$tanggalBeli= date("Y-m-d");
			$username = $_SESSION['user']['username'];

			if(empty($jumlah) OR empty($nama_pembeli) OR empty($alamat)){
				echo "<script>alert('Mohon dipastikan untuk terisi lengkap')</script>";
				echo "<script>location='user.php?id=$id_produk&halaman=detailPembelian';</script>";
			}
			else{
			$query = "INSERT INTO pembelian (id_barang,nama_barang,harga_barang,ukuran,jumlah,total_harga,nama_pembeli,alamat_pembeli,telepon_pembeli,tanggal,username_pembeli)
			VALUES('$id_barang','$nama_barang','$harga_barang','$ukuran','$jumlah','$total','$nama_pembeli','$alamat','$telepon','$tanggalBeli','$username');";
			mysqli_query($connect, $query);
			
			$user1 =  $_SESSION['user']['no'];
			$saldo =  $_SESSION['user']['saldo_user'];
			$updateSaldo = $saldo - $row['harga_barang'];
			
			$query2 = "UPDATE user SET saldo_user=$updateSaldo WHERE no = $user1;";
			mysqli_query($connect, $query2);
			$_SESSION['user']['saldo_user'] = $updateSaldo;
			echo "<script>alert('Konfirmasi Pembelian Sukses');</script>";
			echo "<script>location='user.php';</script>";
			}
		}else if(isset($_POST["batal"])){
			echo "<script>location='user.php';</script>";
		}
		?>
	<?php
		}
	}
?>










							

							