<?php 
include '../config/conn.php';
include 'layouts/header.php'; 
include 'layouts/navbar.php'; 
include 'layouts/sidebar.php';

if (!isset($_SESSION['login'])) { header("location:login.php"); }

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <?php if (isset($_GET['page'])): ?>
    	<?php if ($_GET['page'] == "add"): ?>
    		<?php include 'add_kategori.php'; ?>
    	<?php elseif($_GET['page'] == "edit" && isset($_GET['id'])): ?>
    		<?php include 'edit_kategori.php'; ?>
    	<?php elseif($_GET['page'] == "delete" && isset($_GET['id'])): ?>
    		<?php include 'delete_kategori.php'; ?>
    	<?php endif ?>
    <?php else: ?>
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
       <h1 class="h2">Kategori</h1>
    </div>
		<a href="?page=add" class="btn btn-primary mb-3">
			Tambah
		</a>
	<?php
		$sql  = "SELECT * FROM kategori";
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
					<th>Nama Kategori</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; foreach ($rows as $data): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $data['nama_kategori'] ?></td>
						<td>
							<a href="?page=edit&id=<?= $data['id_kategori'] ?>" class="btn btn-warning text-white btn-sm">
								Edit
							</a>
							<a href="?page=delete&id=<?= $data['id_kategori'] ?>" class="btn btn-danger text-white btn-sm" onclick="return confirm('Apakah Yakin Ingin Menghapus Data Ini')">
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
