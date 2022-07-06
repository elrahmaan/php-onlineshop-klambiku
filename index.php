<?php
	session_start();
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Klambiku | Situs Belanja Pakaian Online Terpercaya No.1 Di Indonesia</title>
	<style type="text/css">
		body{
			background:url(pic4.jpg);
			height: 100vh;
			font-family: sans-serif;
			margin: 0;
		}
		.nav{
			margin:0;
		}
		.nav ul{
			margin:0;
			padding: 0;
			list-style: none;
		}
		.nav ul li {
			position: relative;
			float: left;
			width: 337px;
			height: 25px;
			padding: 0;
			background-color: #252525;			
			font-family: monospace;
			text-align: center;
			font-size: 20px;
			cursor: pointer;
		}
		.nav ul li a{
			text-decoration: none;
			color: white;
			display: block;
		}
		.nav ul li a:hover{
			cursor: pointer;
			background: #ffc107;
			color: #000;
			transition: 0.2s;
		}
		.nav ul li ul li{
			display: none;
		}
		.nav ul li:hover ul li{
			display: block;
			cursor: pointer;
		}
		.layout{
			margin-left: 30px;
			margin-right: 30px;
			margin-bottom: 0;
			padding-bottom: 30px;
			height: 100%;
		}
		.gambar{
	    	width: 90%;
			display: grid;
			grid-template-columns: 1fr 1fr 1fr 1fr;
			margin: auto; 
		}
		.gambar .foto img{
			padding-top: 20px;
			width: 200px;
		}
		.foto{
			margin: 10px;
			text-align: center;
			border-radius: 5px;
			background:white;
		}
		.foto:hover{
			-webkit-transform: scale(1.1);
			-ms-transform: scale(1.1);
			transform: scale(1.1);
			transition: 0.6s;
			cursor: pointer;
		}
		.foto a{
			padding: 10px;
			color: white;
			background: #111;
			text-decoration: none;
			border-radius: 20px;
			cursor: pointer;
			font-weight: bold;
		} 
		.foto a:hover{
			cursor: pointer;
			background: #ffc107;
			color: #000;
		}
	</style>
<body>
	<div style="">
		<table width="100%" style="padding-top: : 5px; color: black; background:#111; margin: 0;">
			<tr>
				<td style="height: 60px; padding-left: 60px;">
					<div style="padding-top: 10px;">
						<img src="brand.jpg" width="200"><a style="font-size:50px;">
					</div>
				</td>
				<td align="center" style="padding-left: 40px; padding-right: 100px;">
					<div style="color: white; font-family: serif; ">Situs Belanja Pakaian Online Terpercaya No.1 Di Indonesia<br>Harga Pas, Barang Berkualitas.<br>Original 100%
					</div>
				</td>
				<td>
					<div  class="login" style="float: right; margin: 17px 50px;color: #fff;background-color: #303030; border-color: #d43f3a;padding: 10px; border-radius: 5px;text-decoration: none;cursor: pointer;">
						<a href="login.php" style="text-decoration: none; font-family: sans-serif; color: white;"><b>LOGIN</b></a>
					</div>
				</td>
			</tr>
		</table>
		<div class="nav" style=" margin:0;">
			<ul>
				<li><a href="index.php">[Home]</a></li>
				<li><a href="">[Product]</a>
					<ul>
						<li><a href="index.php?halaman=kemeja">- Kemeja -</a></li>
						<li><a href="index.php?halaman=jaket">- Hoodie -</a></li>
						<li><a href="index.php?halaman=celana">- Celana -</a></li>
						<li><a href="index.php?halaman=sepatu">- Sepatu -</a></li>
					</ul>
				</li>
				<li><a href="">[Categories]</a>
					<ul>
						<li><a href="index.php?halaman=kategoripria">- Pria -</a></li>
						<li><a href="index.php?halaman=kategoriwanita">- Wanita -</a></li>
					</ul>
				</li>
				<li><a href="index.php?halaman=about">[About]</a></li>
			</ul>
		</div>
		<div class="layout" style="background: rgba(0,0,0,.7);">
			<div class="inner" style="">
				<div>
					<div class="container">
						<div style=" height: 300px; color: white; text-align: center; padding-top: 70px; padding-bottom: 70px; border-top: 1px solid white;">
							<img src="logofix.jpg" width="200" style="margin:0;">
							<hr style="">
							<div id="" style="font-size: 50px; margin-top: 50px;"> SUGENG RAWUH! </div>
							
							<div style="margin-top: 10px; margin-bottom: 50px; background-color: #202020; padding: 50px;"> Nikmati Promo Ramadhan Berkah dari kami, Setiap pendaftar akun mendapat saldo sebesar Rp 200.000. Jangan Sampai Terlewatkan! <br>  Belanja Boleh, Tidak Belanja Dilarang , Jangan Lupa Bahagia.<br> Salam Damai!  </div>
							<hr>
						</div>
						<h1 style="padding-left: 70px; margin-top: 200px; color: white;"><b><u>PRODUK TERBARU</u></b></h1>
						<div class="gambar">
						<?php

							include "koneksi.php";
							$query="SELECT * FROM produk WHERE nama_barang LIKE '%er%'";
							$result= mysqli_query($connect, $query);
							
							if(mysqli_num_rows($result) > 0){
								while ($row = mysqli_fetch_assoc($result)){
							?>
							<div class="foto" style="">
								<img src="<?php echo $row['gambar_barang'];?>">
								<p><b><?php echo $row["nama_barang"]; ?></b></p>
								<p>Harga : <?php echo number_format($row["harga_barang"]); ?> </p>
								<a href="index.php?halaman=belumlogin">Beli Sekarang</a>
							</div>	
							<?php
											}
								}else{
									echo "0 result";
								}
						?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
		if (isset($_GET['halaman'])) {
			echo "<script>alert('Anda Belum Login. Silahkan Login');</script>";
			echo "<script>location='login.php';</script>";
		}
	?>
</body>
	<div class="footer" style="background:#111;  text-align: center; padding-top: 10px; padding-bottom: 10px;">
	<div style="margin-top: 10px;">
		<img src="fb.png" width="13"> <a id="kontak" href="http://facebook.com/elman72" target="_blank" style="color: #fff; text-decoration: none;">El Rahman</a>&nbsp; &nbsp;&nbsp; &nbsp; <img src="instagram.png" width="12"> <a class="kontak" href="http://instagram.com/el.rahman_" target="_blank" style="color: #fff; text-decoration: none;">el.rahman_</a>&nbsp; &nbsp;&nbsp; &nbsp; <img src="wa.png" width="12"> <a id="kontak" href="http://whatsapp.me/081230928718" target="_blank" style="color: #fff; text-decoration: none;">081230928718</a> <br><br>
		<img src="lokasi2.png" width="15"><a style="color: #fff;"> Lingkungan Jogonalan Kelurahan Jogosari Kecamatan Pandaan<br> Jalan Juanda RT01/RW03 Pasuruan <br> Jawa Timur, Indonesia</a><br><br>
		<a style="color: white;">Copyright&copy; 2020 - Developed by <b>A. Rahman.</b><br>Sponsored by <b>Es Degan Juanda.</b></a><br><br>
		
	</div>
</div>
</html>