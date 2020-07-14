<?php
include '../config/conn.php';

if (!isset($_SESSION['login'])) {
	header("location:login.php");
} else {
	header("location:dashboard.php");
}

