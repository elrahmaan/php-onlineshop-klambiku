<?php
	session_start();
	include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrasi Akun</title>
	<style>
		body{
			margin: 0;
			padding: 0;
			background: url(pic4.jpg);
			background-size: cover;
			height: 100vh;
			background-position: center;
			font-family: sans-serif;
		}
		.loginbox{
			width: 370px;
			height: 570px;
			background: rgba(0,0,0,.7);
			color: #fff;
			top: 55%;
			left: 50%;
			position: absolute;
			transform: translate(-50%,-50%);
			box-sizing: border-box;
			padding: 80px 30px;
			border-radius: 20px;
		}
		.avatar{
			width: 100px;
			height: 100px;
			border-radius: 50%;
			position: absolute;
			top: -50px;
			left: calc(50% - 50px);
		}
		h1{
			margin: 0;
			padding: 0 0 20px;
			text-align: center;
			font-size: 22px;
		}

		.loginbox p{
			margin: 0;
			padding: 0;
			font-weight: bold;
		}

		.loginbox input{
			width: 100%;
			margin-bottom: 20px;
		}

		.loginbox input[type="text"], input[type="password"], input[type="email"]{
			border: none;
			border-bottom: 1px solid #fff;
			background: transparent;
			outline: none;
			height: 40px;
			color: #fff;
			font-size: 16px;
		}
		.loginbox input[type="submit"]{
			border: none;
			outline: none;
			height: 40px;
			background: #111;
			color: #fff;
			font-size: 18px;
			border-radius: 20px;
		}
		.loginbox input[type="submit"]:hover{
			cursor: pointer;
			background: #ffc107;
			color: #000;
		}
		.loginbox a{
			text-decoration: none;
			font-size: 12px;
			line-height: 20px;
			color: darkgrey;

		}
		#here{
			text-decoration: none;
			font-size: 12px;
			line-height: 20px;
			color: #fff;
		}
		#here:hover{
			color: #ffc107;
		}
		.loginbox a: hover{
			color: #ffc107;
		}
	</style>		
<body>
<div class="loginbox">
	<img src="avatar2.png" class="avatar">
	<h1>Registrasi Akun</h1>

	<form method="post">
		<p>Username</p>
		<input type="text" name="username" placeholder="Masukkan Username">
		<p>Password</p>
		<input type="password" name="password" placeholder="Masukkan Password">
		<p>Email</p>
		<input type="email" name="email" placeholder="Masukkan Email">
		<p>No Telepon</p>
		<input type="text" name="no_telepon" placeholder="Masukkan Nomor Telepon">
		<input type="submit" name="register" value="REGISTER">
		<a>Punya Akun? <a href="login.php" id="here">Login Disini</a></a>
		
	</form>
</div>

<?php
	if(isset($_POST["register"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	$email = $_POST["email"];
	$no_telepon = $_POST["no_telepon"];
		if(empty($username) OR empty($password) OR empty($email) OR empty($no_telepon)){
			echo "<script>alert('Mohon dipastikan untuk terisi lengkap')</script>";
			echo "<script>location='daftarAkun.php';</script>";
		}
		else{
			$query = "INSERT INTO user (username,password,email,no_telepon,level,saldo_user)
			VALUES('$username','$password','$email','$no_telepon',2,200000)";
			mysqli_query($connect, $query);
			echo "<script>alert('Registrasi Berhasil. Silahkan Login')</script>";
			echo "<script>location='login.php';</script>";
		}
	}
?>
</body>
</head>
</html>