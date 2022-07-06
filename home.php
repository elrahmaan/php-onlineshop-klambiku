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
	
	
	<div class="container">
		<div style=" height: 300px; color: white; text-align: center; padding-top: 70px; padding-bottom: 70px; border-top: 1px solid white;">
			<img src="logofix.jpg" width="200" style="margin:0;">
			<hr>
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
				<img src="<?php echo $row['gambar_barang']?>">
				<p><b><?php echo $row["nama_barang"]; ?></b></p>
				<p>Harga : Rp <?php echo number_format($row["harga_barang"]); ?> </p>
				<a href="user.php?id=<?php echo $row['id_barang'];?>&halaman=detailPembelian">Beli Sekarang</a>
			</div>	
			<?php
							}
				}else{
					echo "0 result";
				}
		?>
		</div>
	</div>