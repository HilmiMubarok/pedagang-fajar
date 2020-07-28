 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
   <h1 class="h2">Tambah Kategori</h1>
</div>

<form method="POST">
	<div class="form-group">
		<label>Nama Kategori</label>
		<input type="text" name="nama_kategori" placeholder="Masukkan Nama Kategori" class="form-control">
	</div>
	<button type="submit" name="btnAddKategori" class="btn btn-primary">
		Simpan
	</button>
</form>

<?php 

	if (isset($_POST['btnAddKategori'])) {
		$name = $_POST['nama_kategori'];

		$sql = "INSERT INTO kategori VALUES ('', '$name') ";

		if ($conn->query($sql)) {
			echo "<script>alert('Data Berhasil Disimpan')</script>";
			echo "<script>window.location.assign('../admin/kategori.php')</script>";
		}
	}


?>