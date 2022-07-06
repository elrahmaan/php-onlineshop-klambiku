<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html>

<head>
	<title>Login User</title>
	<style type="text/css">
		body {
			margin: 0;
			padding: 0;
			background: url(pic4.jpg);
			background-size: cover;
			height: 100vh;
			background-position: center;
			font-family: sans-serif;
		}

		.loginbox {
			width: 320px;
			height: 420px;
			background: rgba(0, 0, 0, .7);
			color: #fff;
			top: 50%;
			left: 50%;
			position: absolute;
			transform: translate(-50%, -50%);
			box-sizing: border-box;
			padding: 80px 30px;
			border-radius: 20px;
		}

		.avatar {
			width: 100px;
			height: 100px;
			border-radius: 50%;
			position: absolute;
			top: -50px;
			left: calc(50% - 50px);
		}

		h1 {
			margin: 0;
			padding: 0 0 20px;
			text-align: center;
			font-size: 22px;
		}

		.loginbox p {
			margin: 0;
			padding: 0;
			font-weight: bold;
		}

		.loginbox input {
			width: 100%;
			margin-bottom: 20px;
		}

		.loginbox input[type="text"],
		input[type="password"] {
			border: none;
			border-bottom: 1px solid #fff;
			background: transparent;
			outline: none;
			height: 40px;
			color: #fff;
			font-size: 16px;
		}

		.loginbox input[type="submit"] {
			border: none;
			outline: none;
			height: 40px;
			background: #111;
			color: #fff;
			font-size: 18px;
			border-radius: 20px;
		}

		.loginbox input[type="submit"]:hover {
			cursor: pointer;
			background: #ffc107;
			color: #000;
		}

		.loginbox a {
			text-decoration: none;
			font-size: 12px;
			line-height: 20px;
			color: darkgrey;

		}

		#here {
			text-decoration: none;
			font-size: 12px;
			line-height: 20px;
			color: #fff;
			font-style: bold;
		}

		#here:hover {
			color: #ffc107;
		}

		.loginbox a: hover {
			color: #ffc107;
		}
	</style>

<body>
	<div class="loginbox">
		<img src="avatar2.png" class="avatar">
		<h1>Login</h1>
		<form method="post">
			<p>Username</p>
			<input type="text" name="username" placeholder="Masukkan Username">
			<p>Password</p>
			<input type="password" name="password" placeholder="Masukkan Password">
			<input type="submit" name="login" value="Login">
			<a>Tidak Memiliki Akun? <a href="daftarAkun.php" id="here">Daftar Disini</a></a>
		</form>
	</div>
	<?php
	//jika ada tombol login ditekan
	if (isset($_POST["login"])) {
		$username = $_POST["username"];
		$password = $_POST["password"];

		//lakukan query
		$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
		$result = mysqli_query($connect, $query);
		$valid = mysqli_num_rows($result);
		if ($valid == 1) {
			$akun = mysqli_fetch_assoc($result);
			$_SESSION["user"] = $akun;
			if ($akun['level'] == 1) {
				echo "<script>location='admin_index.php';</script>";
			} else if ($akun['level'] == 2) {
				echo "<script>location='user.php';</script>";
			}
		} else {
			echo "<script>alert('Anda gagal login, periksa akun Anda');</script>";
			echo "<script>location='login.php';</script>";
		}
	}
	?>
</body>
</head>

</html>