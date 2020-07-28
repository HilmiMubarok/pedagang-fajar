<?php

$id  = $_GET['id'];
$sql = "DELETE FROM masukan WHERE id_masukan = '$id' ";

if ($conn->query($sql)) {
	echo "<script>alert('Data Berhasil Dihapus')</script>";
	echo "<script>window.location.assign('../admin/masukan.php')</script>";
}

?>