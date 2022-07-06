<?php
include "koneksi.php";

$query="DELETE FROM user WHERE username='$_GET[id]'";
$result= mysqli_query($connect, $query);
echo "<script>alert('User Berhasil Dihapus');</script>";
echo "<script>location='admin.php?halaman=pengguna';</script>";
?>