<?php 
include '../config/conn.php';
include 'layouts/header.php'; 
include 'layouts/navbar.php'; 
include 'layouts/sidebar.php';

if (!isset($_SESSION['login'])) { header("location:login.php"); }

?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
       <h1 class="h2">Kategori</h1>
    </div>
    <?php if (isset($_GET['page'])): ?>
    	<?php if ($_GET['page'] == "add"): ?>
    		<?php include 'add_kategori.php'; ?>
    	<?php endif ?>
    <?php else: ?>
		<button class="btn btn-primary mb-3">
			Tambah
		</button>
		<table class="table table-hover table-bordered table-stripped">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama Kategori</th>
					<th>Nama Kategori</th>
				</tr>
			</thead>
		</table>
    <?php endif ?>
  </main>
</div>
</div>

<?php include 'layouts/footer.php'; ?>
