<?php

$id  = $_GET['id'];
$sql = "DELETE FROM kategori WHERE id_kategori = '$id' ";

if ($conn->query($sql)) {
	echo "<script>alert('Data Berhasil Dihapus')</script>";
	echo "<script>window.location.assign('../admin/kategori.php')</script>";
}

?>