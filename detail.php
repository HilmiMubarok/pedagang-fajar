<?php 

include 'config/conn.php';

include 'layouts/header.php'; 
include 'layouts/navbar.php'; 
include 'layouts/sidebar.php';

$id = $_GET['id'];
$sql = "SELECT * FROM produk WHERE id_produk = '$id' ";
$res = $conn->query($sql);
$data = $res->fetch_assoc();


?>
			<div class="col-md-8 col-sm-12 mt-2">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title text-white">
							Produk <?= $data['nama_produk'] ?>
						</h3>
					</div>
					<div class="card-body">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-sm-12 col-md-4 text-center">
										<img src="assets/img/produk/<?= $data['foto_produk'] ?>" width="100">
									</div>
									<div class="col-sm-12 col-md-8 text-left">
										<h5><?= $data['nama_produk'] ?></h5>
										<p>Rp. <?= number_format($data['harga_produk']) ?> <br> Penjual : Ibuk Romdhonah</p>
									</div>
								</div>
							</div>
								<a href="http://wa.me/6283838395183?text=Saya%20tertarik%20dengan%20<?= $data['nama_produk'] ?>%20Anda%20yang%20dijual" target="_blank" class="btn btn-block btn-success">
									<div class="card-footer text-center" style="border: none;">
										<span class="h5"><i class="fab fa-whatsapp"></i> Beli Lewat WhatsApp</span>
									</div>
								</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php include 'layouts/footer.php' ?>