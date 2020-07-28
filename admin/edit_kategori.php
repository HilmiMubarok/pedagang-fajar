<?php

$id   = $_GET['id'];
$sql  = "SELECT * FROM kategori WHERE id_kategori = '$id' ";
$res  = $conn->query($sql);
$data = $res->fetch_assoc();

?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
   <h1 class="h2">Edit Kategori</h1>
</div>

<form method="POST">
	<div class="form-group">
		<label>Nama Kategori</label>
		<input type="text" name="nama_kategori" placeholder="Masukkan Nama Kategori" class="form-control" value="<?= $data['nama_kategori'] ?>">
	</div>
	<button type="submit" name="btnUpdateKategori" class="btn btn-primary">
		Simpan
	</button>
</form>

<?php 

	if (isset($_POST['btnUpdateKategori'])) {
		$name = $_POST['nama_kategori'];

		$sql = "UPDATE kategori SET nama_kategori = '$name' WHERE id_kategori = '$id' ";

		if ($conn->query($sql)) {
			echo "<script>alert('Data Berhasil Disimpan')</script>";
			echo "<script>window.location.assign('../admin/kategori.php')</script>";
		}
	}


?>