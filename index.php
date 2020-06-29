<?php 

include 'config/conn.php';

include 'layouts/header.php'; 
include 'layouts/navbar.php'; 
include 'layouts/sidebar.php' 

?>


<?php

	if (isset($_GET['page'])) {
		if ($_GET['page'] == "asd") {
			echo "asd";
		}
	} else {
		include 'app.php';
	}

?>



<?php include 'layouts/footer.php' ?>
	
			
	