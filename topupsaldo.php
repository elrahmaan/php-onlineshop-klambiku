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
	.itemform input[type="text"]{
		display: block;
	  	width: 100%;
	  	height: 34px;
		padding: 6px 12px;
		font-size: 14px;
		color: #555;
		background-color: #fff;
		border: 1px solid #ccc;
		border-radius: 4px;
	}
	tr: nth-child(even){
		background-color: #f2f2f2;
	}
</style>
<div style="padding-top: 60px; padding-bottom: 60px;">
	<div style="background: #DFDFDF; width: 600px; padding: 10px 10px 10px 10px; border-radius: 5px; margin-top: 45px; margin-left: 330px; ">
		<div align="center" style="">
			<h1 align="center" style="font-family: sans-serif;">TOP UP SALDO</h1>
			<h3 align="center">Masukkan Kode Voucher</h3>
			<form method="post" enctype="multipart/form-data">
				<div class="itemform">
					<label>Kode Voucher</label><br>
					<input type="text" name="kode" style="width: 50%; height: 16px; padding-top: 9px; padding-bottom: 9px;">
					<input type="submit" class="tombol-biru" name="kirim" value="KIRIM">	
				</div>
				
			</form>
		</div>
	</div>		
</div>
<?php
	if (isset($_POST["kirim"])) {
		$voucher = $_POST["kode"];
		$query = "SELECT * FROM voucher WHERE kode_voucher='$voucher';";
		$result= mysqli_query($connect, $query);	 
	 	$valid = mysqli_num_rows($result);
		if($valid==1){
				$row = mysqli_fetch_assoc($result);
				$noUser = $_SESSION["user"]["no"];
				$saldoUser = $_SESSION["user"]["saldo_user"];
				$isi = $row["isi_voucher"];
				$updateSaldo = $saldoUser + $isi;
				$query2 = "UPDATE user SET saldo_user=$updateSaldo WHERE no=$noUser;";
				mysqli_query($connect, $query2);
				$_SESSION["user"]["saldo_user"] = $updateSaldo;
				echo "<script>alert('Kode Voucher Valid. Saldo Berhasil Ditambahkan');</script>";
				echo "<script>location='user.php';</script>";
		}else{
			echo "<script>alert('Kode Voucher Tidak Valid, mohon ulangi');</script>";
			echo "<script>location='user.php?halaman=topupSaldo';</script>";
		}
		
	}
	?>