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
	.itemform input{
		height: 20px;
		width: 95%;
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
<div style="padding: 70px 500px 50px 380px;  ">
	<div style="background: #DFDFDF; width: 600px; padding: 10px 10px 10px 10px; border-radius: 5px;">
		<div style="">
			<?php
			$akun = $_SESSION["user"]["username"];
			$query = "SELECT * FROM user WHERE username='$akun'";
			$result = mysqli_query($connect,$query);
				if(mysqli_num_rows($result) > 0){
					while ($row = mysqli_fetch_assoc($result)){
				 	?>		
				<h1 align="center" style="font-family: sans-serif;">Ubah Data Akun</h1>
				<h3 align="center">Data Pribadi Lama</h3>
				<form method="post" enctype="multipart/form-data">
					<div class="itemform">
						<label>Username</label><a style="color: #FF0000; font-size:12px;">  *username tidak dapat diubah</a><br>
						<a class="form" name="" style="width: 95%; height: 16px; padding-top: 9px; padding-bottom: 9px;"><?php echo $_SESSION["user"]["username"]; ?></a>
					</div>
					<div class="itemform">
						<label>Password</label>
						
						<a type="password" class="form" name="" style="width: 95%; height: 16px; padding-top: 9px; padding-bottom: 9px;"><?php echo $_SESSION["user"]["password"]; ?></a>
					</div>
					<div class="itemform">
						<label>Email</label>
						
						<a class="form" name="" style="width: 95%; height: 16px; padding-top: 9px; padding-bottom: 9px;"><?php echo $_SESSION["user"]["email"]; ?></a>
					</div>
					<div class="itemform">
						<label>No Telepon</label>
						<a class="form" name="" style="width: 95%; height: 16px; padding-top: 9px; padding-bottom: 9px;"><?php echo $_SESSION["user"]["no_telepon"]; ?></a>
					</div>

					<h3 align="center">Edit Data</h3>
					<div class="itemform">
						<label>Username</label><br>
						<a class="form" name="nama" style="width: 95%; height: 16px; padding-top: 9px; padding-bottom: 9px;"><?php echo $_SESSION["user"]["username"]; ?></a>
					</div>
					<div class="itemform">
						<label>Password</label>
						<input type="text" class="form" name="passwordBaru">
					</div>
					<div class="itemform">
						<label>Email</label>
						<input type="text" class="form" name="emailBaru">
					</div>
					<div class="itemform">
						<label>No Telepon</label>
						<input type="text" class="form" name="notelpBaru">
					</div>
					<input type="submit" class="tombol-biru" name="konfirmasi" value="KONFIRMASI">
					<input type="submit" class="tombol-merah" name="batal" value="BATAL">
				</form>				
		</div>
	</div>		
</div>					
<?php
	if(isset($_POST['konfirmasi'])){
		$passwordBaru = $_POST['passwordBaru'];
		$emailBaru = $_POST['emailBaru'];
		$notelpBaru = $_POST['notelpBaru'];
		$no = $_SESSION['user']['no'];

		if (empty($passwordBaru) OR empty($emailBaru) OR empty($notelpBaru)) {
			echo "<script>alert('Mohon diisi dengan lengkap');</script>";
			echo "<script>location='user.php?id=<?php echo $akun; ?>&halaman=editAkun';</script>";	
		}
		else{
		$query1 = "UPDATE user SET password='$passwordBaru',email='$emailBaru',no_telepon='$notelpBaru' WHERE no=$no";
		mysqli_query($connect,$query1);
		$_SESSION["user"]["password"] = $passwordBaru;
		$_SESSION["user"]["no_telepon"] = $notelpBaru;
		$_SESSION["user"]["email"] = $emailBaru;
		
		echo "<script>alert('Data Berhasil Diubah');</script>";
		echo "<script>location='user.php?halaman=informasiAkun';</script>";
		}
	}else if(isset($_POST['batal'])){
		echo "<script>location='user.php?halaman=informasiAkun';</script>";
	}	
?>
			<?php
					}
				}
			?>