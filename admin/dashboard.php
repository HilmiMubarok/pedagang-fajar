<?php 
include '../config/conn.php';
include 'layouts/header.php'; 
include 'layouts/navbar.php'; 
include 'layouts/sidebar.php';

if (!isset($_SESSION['login'])) { header("location:login.php"); }

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
       <h1 class="h2">Dashboard</h1>
    </div>
    <div class="row">
    	<div class="col">
    		<div class="card bg-primary text-white shadow">
    			<div class="card-body">
                    <?php
                        $sql = "SELECT * FROM produk";
                        $res = $conn->query($sql);
                        $jumlahProduk = $res->num_rows;
                    ?>
    				<p>Jumlah Produk</p>
    				<h2>
    					<?= $jumlahProduk ?> Produk
    				</h2>
    			</div>
    		</div>
    	</div>
    	<div class="col">
    		<div class="card bg-danger text-white shadow">
    			<div class="card-body">
    				<?php
                        $sql = "SELECT * FROM kategori";
                        $res = $conn->query($sql);
                        $jumlahKategori = $res->num_rows;
                    ?>
                    <p>Jumlah Produk</p>
                    <h2>
                        <?= $jumlahKategori ?> Kategori
                    </h2>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <div class="card bg-success shadow text-white">
                <div class="card-body">
                    <?php
                        $sql = "SELECT * FROM masukan ORDER BY id_masukan DESC limit 5";
                        $res  = $conn->query($sql);
                        $rows = [];
                        while ($row = $res->fetch_assoc()) {
                            $rows[] = $row;
                        }
                    ?>
                    <h5>Masukan Terbaru</h5>
                    <div class="table-responsive mt-3">
                        <table class="table table-hover table-bordered text-white">
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Pesan</th>
                            </tr>
                            <?php $no = 1; foreach ($rows as $data): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= $data['pesan'] ?></td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br><br><br>
</main>
</div>
</div>

<?php include 'layouts/footer.php'; ?>
