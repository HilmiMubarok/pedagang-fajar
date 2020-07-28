<?php 
include '../config/conn.php';
include 'layouts/header.php'; 
include 'layouts/navbar.php'; 
include 'layouts/sidebar.php';

if (!isset($_SESSION['login'])) { header("location:login.php"); }

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <?php if (isset($_GET['page'])): ?>
    	<?php if ($_GET['page'] == "delete"): ?>
    		<?php include 'delete_masukan.php'; ?>
    	<?php endif ?>
    <?php else: ?>
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
       <h1 class="h2">Masukan</h1>
    </div>
		
	<?php
		$sql  = "SELECT * FROM masukan ORDER BY id_masukan DESC";
		$res  = $conn->query($sql);
		$rows = [];
		while ($row = $res->fetch_assoc()) {
			$rows[] = $row;
		}
	?>
		<table class="table table-hover table-bordered table-stripped">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>Pesan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; foreach ($rows as $data): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $data['nama'] ?></td>
						<td><?= $data['pesan'] ?></td>
						<td>
							<a href="?page=delete&id=<?= $data['id_masukan'] ?>" class="btn btn-danger text-white btn-sm" onclick="return confirm('Apakah Yakin Ingin Menghapus Data Ini')">
								Delete
							</a>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
    <?php endif ?>
  </main>
</div>
</div>

<?php include 'layouts/footer.php'; ?>
