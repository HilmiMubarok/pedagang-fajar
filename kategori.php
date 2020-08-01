<?php 

include 'config/conn.php';

include 'layouts/header.php'; 
include 'layouts/navbar.php'; 
include 'layouts/sidebar.php';

$id   = $_GET['id'];
$sql  = "SELECT * FROM produk JOIN kategori ON produk.kategori_id = kategori.id_kategori WHERE produk.kategori_id = '$id' ";
$res  = $conn->query($sql);
$rows = [];

while ($row = $res->fetch_assoc()) {
	$rows[] = $row;
}



?>
			<div class="col-md-8 col-sm-12 mt-2">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title text-white">
							Produk <?= $row['nama_produk'] ?>
						</h3>
					</div>
					<div class="card-body">
						<div class="row">
							<?php foreach ($rows as $data): ?>
								
								<div class="col mt-2">
									<div class="card">
										<div class="card-body">
											<div class="row">
												<div class="col-sm-12 col-md-12 col-lg-4 mt-2 text-center">
													<img src="assets/img/produk/<?= $data['foto_produk'] ?>" width="250">
												</div>
												<div class="col-sm-12 col-md-12 col-lg-8 mt-2">
													<h5><?= $data['nama_produk'] ?></h5>
													<p>Rp. <?= number_format($data['harga_produk']) ?> <br> Penjual : Ibuk Romdhonah</p>
												</div>
											</div>
										</div>
										<div class="card-footer text-center">
											<div class="row">
												<div class="col mt-2">
													<a href="detail.php?id=<?= $data['id_produk'] ?>" class="btn btn-block btn-primary">
														<i class="far fa-arrow-alt-circle-right"></i> Detail
													</a>
												</div>
												<div class="col mt-2">
													<a href="http://wa.me/6283838395183?text=Saya%20tertarik%20dengan%20<?= $data['nama_produk'] ?>%20Anda%20yang%20dijual" target="_blank" class="btn btn-block btn-success">
														<i class="fab fa-whatsapp"></i> Beli
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include 'layouts/footer.php' ?>