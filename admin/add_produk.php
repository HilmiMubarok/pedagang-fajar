 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
   <h1 class="h2">Tambah Produk</h1>
</div>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Kategori</label>
		<select name="kategori_id" class="form-control">
			<option>-- Pilih Kategori Produk -- </option>
			<?php
				$sql = "SELECT * FROM kategori";
				$res = $conn->query($sql);
				while($row = $res->fetch_assoc()):
			?>

				<option value="<?= $row['id_kategori'] ?>"><?= $row['nama_kategori'] ?></option>

			<?php endwhile ?>
		</select>
	</div>
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" name="nama_produk" class="form-control" placeholder="Masukkan Nama Produk">
	</div>
	<div class="form-group">
		<label>Foto Produk</label>
		<input type="file" name="foto_produk" class="form-control">
	</div>
	<div class="form-group">
		<label>Harga Produk</label>
		<input type="number" name="harga_produk" class="form-control" placeholder="Masukkan Harga Produk">
	</div>
	<div class="form-group">
		<label>Deskripsi Produk</label>
		<textarea name="deskripsi_produk" class="form-control"></textarea>
	</div>
	<button type="submit" name="btnAddProduk" class="btn btn-primary">
		Simpan
	</button>
</form>

<br><br><br>

<?php 

	if (isset($_POST['btnAddProduk'])) {


		$nama      = $_POST['nama_produk'];
		$kategori  = $_POST['kategori_id'];
		$foto      = $_FILES['foto_produk']['name'];
		$harga     = $_POST['harga_produk'];
		$deskripsi = $_POST['deskripsi_produk'];

		$file = $_FILES['foto_produk']['tmp_name'];
		$dir = "../assets/img/produk/". $foto;

		if (move_uploaded_file($file, $dir)) {
			$sql = "INSERT INTO produk VALUES ('', '$kategori', '$nama', '$foto', '$harga', '$deskripsi') ";
			if ($conn->query($sql)) {
				echo "<script>alert('Data Berhasil Disimpan')</script>";
				echo "<script>window.location.assign('../admin/produk.php')</script>";
			} else {
				echo "<script>alert('Data Gagal Disimpan')</script>";
				echo "<script>window.location.assign('../admin/produk.php?page=add')</script>";
			}
		} else {
			echo "<script>alert('Mohon Masukkan Foto Produk')</script>";
			echo "<script>window.location.assign('../admin/produk.php?page=add')</script>";
		}

	}


?>