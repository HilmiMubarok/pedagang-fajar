<?php

include '../config/conn.php';

if (logout('logged_in')) {
	header("location:../admin/login.php");
}