<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>

<head>
	<title>Klambiku | Situs Belanja Pakaian Online Terpercaya No.1 Di Indonesia</title>
	<style type="text/css">
		body {
			background: url(pic4.jpg);
			height: 100vh;
			font-family: sans-serif;
			margin: 0;
		}

		.logo {
			float: left;
			color: red;
			margin-top: 7px;
			border: 2px solid white;
			padding: 5px;
			font-size: 32px;
			font-style: italic;
			font-family: monospace;
			font-weight: bold;
			border-radius: 10px;
			background: black;
		}

		#drop-content {
			position: absolute;
			z-index: 1;
		}

		#drop-content a {
			display: block;
			font-size: 17px;
			background: #303030;
			color: white;
			text-align: center;
			text-decoration: none;
			width: 165px;
			padding-right: 10px;
			padding-left: 10px;
			margin-top: 2px;
		}

		#drop-content a:hover {
			cursor: pointer;
			background: #ffc107;
			color: #000;
		}

		.nav {
			margin: 0;
		}

		.nav ul {
			margin: 0;
			padding: 0;
			list-style: none;
		}

		.nav ul li {
			float: left;
			width: 337px;
			height: 25px;
			padding: 0;
			background-color: #202020;
			font-family: monospace;
			text-align: center;
			font-size: 20px;
			cursor: pointer;
		}

		.nav ul li a {
			text-decoration: none;
			color: white;
			display: block;
		}

		.nav ul li a:hover {
			cursor: pointer;
			background: #ffc107;
			color: #000;
			transition: 0.2s;
		}

		.nav ul li ul li {
			display: none;
			position: relative;
		}

		.nav ul li:hover ul li {
			display: block;
			cursor: pointer;
		}

		.layout {
			margin-left: 30px;
			margin-right: 30px;
			margin-bottom: 0;
			padding-bottom: 30px;
			height: 100%;
		}
	</style>
</head>

<body>
	<div style="">
		<table width="100%" style="padding-top: : 5px;color: black;background:#111; margin: 0;">
			<tr>
				<td style="height: 60px; padding-left: 60px;">
					<div style="padding-top: 10px;">
						<img src="brand.jpg" width="200"><a style="font-size:50px;">
					</div>
				</td>
				<td align="center" style="padding-left: 40px; padding-right: 100px;">
					<div style="color: white; font-family: sans-serif; ">Situs Belanja Pakaian Online Terpercaya No.1 Di Indonesia<br>Harga Pas, Barang Berkualitas.<br>Original 100%
					</div>
				</td>
				<td>
				<td style="">
					<table onclick="show_hide()" style="background-color:#303030; color:white; padding: 1px 10px 1px 10px;border-radius: 20px; border:3px solid #202025;margin-left: 20px;">
						<tbody>
							<tr>
								<td rowspan="2" style="padding-right: 6px">
									<img src="avatar2.png" style="border-radius: 30px" width="40px">
								</td>
								<td>Hi <?php echo $_SESSION["user"]["username"]; ?>!</td>
								<td rowspan="2" style="cursor: pointer;">
									<img src="button.jpg" style="width:20px;">
								</td>
							</tr>
							<tr>
								<td style="font-size:12px"> Saldo: Rp. <?php echo number_format($_SESSION["user"]["saldo_user"]); ?>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<div style="display: none;" id="drop-content">
										<a href="user.php?halaman=informasiAkun">Informasi Akun</a>
										<a href="user.php?halaman=topupSaldo">Top Up Saldo</a>
										<a href="logout.php" onclick="return confirm('Anda Yakin Ingin Logout?')">Logout</a>
									</div>
									<script>
										function show_hide() {
											var click = document.getElementById("drop-content");
											if (click.style.display == "none") {
												click.style.display = "block";
											} else {
												click.style.display = "none";
											}
										}
									</script>
								</td>
							</tr>
						</tbody>
					</table>
				</td>
				</td>
			</tr>
		</table>
		<div class="nav" style=" margin:0;">
			<ul>
				<li><a href="user.php">[Home]</a></li>
				<li><a href="">[Product]</a>
					<ul>
						<li><a href="user.php?halaman=kemeja">- Kemeja -</a></li>
						<li><a href="user.php?halaman=jaket">- Hoodie -</a></li>
						<li><a href="user.php?halaman=celana">- Celana -</a></li>
						<li><a href="user.php?halaman=sepatu">- Sepatu -</a></li>
					</ul>
				</li>
				<li><a href="">[Categories]</a>
					<ul>
						<li><a href="user.php?halaman=kategoripria">- Pria -</a></li>
						<li><a href="user.php?halaman=kategoriwanita">- Wanita -</a></li>
					</ul>
				</li>
				<li><a href="user.php?halaman=about">[About]</a></li>
			</ul>
		</div>

		<div class="layout" style="background: rgba(0,0,0,.4);">
			<div class="inner" style="padding-top: 20px;">
				<div>
					<?php
					if (isset($_GET['halaman'])) {
						if ($_GET['halaman'] == "kemeja") {
							include 'kemeja.php';
						} else if ($_GET['halaman'] == "jaket") {
							include 'jaket.php';
						} else if ($_GET['halaman'] == "celana") {
							include 'celana.php';
						} else if ($_GET['halaman'] == "sepatu") {
							include 'sepatu.php';
						} else if ($_GET['halaman'] == "kategoripria") {
							include 'kategoripria.php';
						} else if ($_GET['halaman'] == "kategoriwanita") {
							include 'kategoriwanita.php';
						} else if ($_GET['halaman'] == "about") {
							include 'about.php';
						} else if ($_GET['halaman'] == "informasiAkun") {
							include 'informasiakun.php';
						} else if ($_GET['halaman'] == "editAkun") {
							include 'editakun.php';
						} else if ($_GET['halaman'] == "detailPembelian") {
							include 'detailpembelian.php';
						} else if ($_GET['halaman'] == "detailPembelianSepatu") {
							include 'detailpembelianpepatu.php';
						} else if ($_GET['halaman'] == "topupSaldo") {
							include 'topupsaldo.php';
						} else if ($_GET['halaman'] == "about") {
							include 'about.php';
						}
					} else {
						include 'home.php';
					}
					?>
				</div>
			</div>
		</div>
	</div>
</body>
<div class="footer" style="background:#111;  text-align: center; padding-top: 10px; padding-bottom: 10px;">
	<div style="margin-top: 10px;">
		<img src="fb.png" width="13"> <a id="kontak" href="http://facebook.com/elman72" target="_blank" style="color: #fff; text-decoration: none;">El Rahman</a>&nbsp; &nbsp;&nbsp; &nbsp; <img src="instagram.png" width="12"> <a class="kontak" href="http://instagram.com/el.rahman_" target="_blank" style="color: #fff; text-decoration: none;">el.rahman_</a>&nbsp; &nbsp;&nbsp; &nbsp; <img src="wa.png" width="12"> <a id="kontak" href="http://whatsapp.me/081230928718" target="_blank" style="color: #fff; text-decoration: none;">081230928718</a> <br><br>
		<img src="lokasi2.png" width="15"><a style="color: #fff;"> Lingkungan Jogonalan Kelurahan Jogosari Kecamatan Pandaan<br> Jalan Juanda RT01/RW03 Pasuruan <br> Jawa Timur, Indonesia</a><br><br>
		<a style="color: white;">Copyright&copy; 2020 - Developed by <b>A. Rahman.</b><br>Sponsored by <b>Es Degan Juanda.</b></a><br><br>
	</div>
</div>

</html>




22