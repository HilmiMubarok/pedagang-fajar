<?php

$id  = $_GET['id'];

// Hapus Foto
$query = "SELECT * FROM produk WHERE id_produk = '$id' ";
$res   = $conn->query($query);
$hasil = $res->fetch_assoc();
$foto  = $hasil['foto_produk'];

$sql = "DELETE FROM produk WHERE id_produk = '$id' ";

if ($conn->query($sql)) {
	if (is_file("../assets/img/produk/". $foto)) {
		unlink("../assets/img/produk/". $foto);
	}
	echo "<script>alert('Data Berhasil Dihapus')</script>";
	echo "<script>window.location.assign('../admin/produk.php')</script>";
}

?>