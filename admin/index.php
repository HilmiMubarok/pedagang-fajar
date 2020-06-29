<?php
error_reporting(0);
include '../config/conn.php';

include 'layouts/header.php'; 
include 'layouts/navbar.php'; 
include 'layouts/sidebar.php';




if (isset($_GET['page'])) {
	if ($_GET['page'] == "login") {
		echo "<meta http-equiv='refresh' content='login.php;0'>";
	} elseif ($_GET['page'] == "dashboard") {
		include 'dashboard.php';
	}
} else {
	echo "<meta http-equiv='refresh' content='login.php;0'>";
}







include 'layouts/footer.php';