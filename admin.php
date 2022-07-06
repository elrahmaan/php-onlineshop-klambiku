<?php
	session_start();
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Klambiku | Administrator</title>
	<style type="text/css">
		body{
			margin: 0;
			padding:0;
			background:cover;
			border: none;
		}
		table{
			border-collapse: collapse;
			border-spacing: 0;
			width: 100%;
			border:1px solid #ddd;
		}
		th, td{
			text-align: left;
			padding: 16px;
		}
		tr: nth-child(even){
			background-color: #f2f2f2;
		}
		.button{
			padding: 30px 0 30px 0;
			border-bottom: 1px solid grey;
		}
		.button a{
			font-size: 20px;
			text-decoration: none;
			color: white;
			font-weight: bold;
			font-family: sans-serif;
			padding: 60px;
		}
		.button:hover{
			cursor: pointer;
			background: #ffc107;
			color: #000;
		}
		.navbar {
        	z-index: 1;
        	position: absolute;
        	width: 260px;
    	}
        .text-center {
            text-align:center;		
		}	
	</style>
</head>
<body>
	<div style=" width: 100%;background:#202020;">    
    	<div  class="tombol-merah" style="float: right; margin: 17px 50px;">
			<a href="logout.php" onclick="return confirm('Anda Yakin Ingin Logout?')" style="text-decoration: none; font-family: sans-serif; color: white;">LOGOUT</a>
		</div>
    	<div style="height: 70px; background:#424242;">
			<div style="background: #d50000; height: 70px; width: 260px; text-align: center;">
				<div style="padding-top: 21px; font-size: 30px; font-family: sans-serif; color: white;">
				<strong>ADMIN ME</strong>
				</div>
			</div>		
		</div>  
        <div class=" navbar" role="navigation">
        	<div style="background:transparent; margin:0;  text-align: center;">
				<img src="avatar.png" width="150">
	        	<div class="button"><a href="admin.php">Home</a></div>
				<div class="button"><a href="admin.php?halaman=pengguna">Pengguna</a></div>
				<div class="button"><a href="admin.php?halaman=produk">Produk</a></div>				
				<div class="button"><a href="admin.php?halaman=pembelian">Pembelian</a></div>	
        	</div>
        </div>  
		<div style="padding: 15px 15px; background:#F3F3F3; margin: 0 0 0 260px;padding: 15px 30px; min-height: 600px;">
            <div style=" width:100%;margin:10px 20px 10px 0px;background-color:#fff;padding:10px; min-height: 600px;">
    			<div style="padding-right: 20px; padding-left: 20px;">
					<?php
						if (isset($_GET['halaman'])) {
							if($_GET['halaman']=="pengguna"){
								include 'admindatapengguna.php';
							}else if($_GET['halaman']=="produk"){
								include 'admindataproduk.php';
							}else if($_GET['halaman']=="pembelian"){
								include 'admindatapembelian.php';
							}else if($_GET['halaman']=="tambahproduk"){
								include 'admintambahproduk.php';
							}else if($_GET['halaman']=="hapusproduk"){
								include 'adminhapusproduk.php';
							}else if($_GET['halaman']=="hapusakun"){
								include 'adminhapusakun.php';
							}
						}else{
							include 'adminhome.php';
						}
					?>
				</div>
				</div>
		</div>			
	</div>
</body>
</html>