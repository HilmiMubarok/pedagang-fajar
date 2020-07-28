<?php

$id   = $_GET['id'];
$sql  = "SELECT * FROM produk JOIN kategori ON produk.kategori_id = kategori.id_kategori WHERE produk.id_produk = '$id' ";
$res  = $conn->query($sql);
$data = $res->fetch_assoc();

?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
   <h1 class="h2">Edit Produk</h1>
</div>

<form method="POST" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Kategori</label>
		<select name="kategori_id" class="form-control">
			<?php
				$sql = "SELECT * FROM kategori";
				$res = $conn->query($sql);
				while($row = $res->fetch_assoc()):
			?>

				<option value="<?= $row['id_kategori'] ?>" <?= ($data['kategori_id'] == $row['id_kategori'] ? "selected" : null) ?> ><?= $row['nama_kategori'] ?></option>

			<?php endwhile ?>
		</select>
	</div>
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" name="nama_produk" class="form-control" value="<?= $data['nama_produk'] ?>">
	</div>
	<div class="form-group">
		<label>Foto Produk</label>
		<input type="file" name="foto_produk" class="form-control">
	</div>
	<div class="form-group">
		<label>Harga Produk</label>
		<input type="number" name="harga_produk" class="form-control" value="<?= $data['harga_produk'] ?>">
	</div>
	<div class="form-group">
		<label>Deskripsi Produk</label>
		<textarea name="deskripsi_produk" class="form-control"><?= $data['deskripsi_produk'] ?></textarea>
	</div>
	<button type="submit" name="btnUpdateProduk" class="btn btn-primary">
		Simpan
	</button>
</form>

<?php 

	if (isset($_POST['btnUpdateProduk'])) {


		$nama      = $_POST['nama_produk'];
		$kategori  = $_POST['kategori_id'];
		$foto      = $_FILES['foto_produk']['name'];
		$harga     = $_POST['harga_produk'];
		$deskripsi = $_POST['deskripsi_produk'];

		$file = $_FILES['foto_produk']['tmp_name'];
		$dir  = "../assets/img/produk/". $foto;

		if (!empty($_FILES)) {
			if (move_uploaded_file($file, $dir)) {
				$sql = "UPDATE produk SET kategori_id = '$kategori', nama_produk = '$nama', foto_produk = '$foto', harga_produk = '$harga', deskripsi_produk = '$deskripsi' WHERE id_produk = '$id' ";
				if ($conn->query($sql)) {
					if (is_file("../assets/img/produk/". $data['foto_produk'])) {
						unlink("../assets/img/produk/". $data['foto_produk']);
					}
					echo "<script>alert('Data Berhasil Diupdate')</script>";
					echo "<script>window.location.assign('../admin/produk.php')</script>";
				} else {
					echo "<script>alert('Data Gagal Diupdate')</script>";
					echo "<script>window.location.assign('../admin/produk.php?page=add')</script>";
				}
			}
		} else {
			$sql = "UPDATE produk SET kategori_id = '$kategori', nama_produk = '$nama', harga_produk = '$harga', deskripsi_produk = '$deskripsi' WHERE id_produk = '$id' ";
			if ($conn->query($sql)) {
				echo "<script>alert('Data Berhasil Diupdate')</script>";
				echo "<script>window.location.assign('../admin/produk.php')</script>";
			} else {
				echo "<script>alert('Data Gagal Diupdate')</script>";
				echo "<script>window.location.assign('../admin/produk.php?page=add')</script>";
			}
		}

	}


?>