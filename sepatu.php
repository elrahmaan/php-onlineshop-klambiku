<style type="text/css">
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
		background: #202020;
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
</head>
<body>	
	<div class="container" style="">
		<h1 style="padding-left: 70px; padding-top: 20px; color: white;"><b><u>Sepatu</u></b></h1>
		<div class="gambar">
		<?php
			include "koneksi.php";
			$query="SELECT * FROM produk WHERE jenis_barang LIKE '%Sepatu%'";
			$result= mysqli_query($connect, $query);
			if(mysqli_num_rows($result) > 0){
				while ($row = mysqli_fetch_assoc($result)){
		?>
			<div class="foto" style="">
				<img src="<?php echo $row['gambar_barang']?>">
				<p><b><?php echo $row["nama_barang"] ?></b></p>
				<p>Harga : Rp <?php echo number_format($row["harga_barang"]); ?> </p>
				<a href="user.php?id=<?php echo $row['id_barang'];?>&halaman=detailPembelianSepatu">Beli Sekarang</a>
			</div>	
		<?php
				}
			}
		?>
		</div>
	</div>
</body>
</html>