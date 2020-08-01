<?php

$sql  = "SELECT * FROM kategori ORDER BY id_kategori DESC";
$res  = $conn->query($sql);
$rows = [];

while ($row = $res->fetch_assoc()) {
	$rows[] = $row;
}

?>

<div class="container-fluid mt-2">
	<div class="row">
		<div class="col-md-4 col-sm-12 mt-2">
			<div class="card shadow">
				<div class="card-header">
					<h3 class="card-title text-white">Kategori</h3>
				</div>
				<div class="card-body">
					<nav class="nav-kategori">
						<ul>
							<?php foreach ($rows as $data): ?>
								<li><a href="kategori.php?id=<?= $data['id_kategori'] ?>"><?= $data['nama_kategori'] ?></a></li>
							<?php endforeach ?>
						</ul>
					</nav>
				</div>
			</div>
			<hr>
			<div class="card shadow">
				<div class="card-header">
					<h3 class="card-title text-white">Masukan</h3>
				</div>
				<div class="card-body">
					<form method="POST">
						<div class="form-group">
							<label>Nama</label>
							<input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Anda">
						</div>
						<div class="form-group">
							<label>Pesan</label>
							<textarea name="pesan" cols="30" class="form-control"></textarea>
						</div>
						<button type="submit" name="btnmasukan" class="btn btn-primary">
							Kirim
						</button>
					</form>
					<?php

						if (isset($_POST['btnmasukan'])) {
							$nama    = $_POST['nama'];
							$masukan = $_POST['masukan'];
							$sql     = "INSERT INTO masukan VALUES ('', '$nama', '$masukan') ";

							if ($conn->query($sql)) {
								echo "<script>alert('Sukses, Masukan Anda Kami Terima')</script>";
								echo "<script>window.location.assign('index.php')</script>";
							}
						}

					?>
				</div>
			</div>
		</div>