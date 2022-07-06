<?php
include "koneksi.php";

$query="DELETE FROM produk WHERE id_barang='$_GET[id]'";
$result= mysqli_query($connect, $query);
echo "<script>alert('Produk Berhasil Dihapus');</script>";
echo "<script>location='admin.php?halaman=produk';</script>";
?>