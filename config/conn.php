<?php

session_start();

$host     = "localhost";
$username = "root";
$password = "";
$database = "pedagang_fajar";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
	die("Koneksi ke database Gagal : ". $conn->connect_error);
}

function login($username, $password)
{
	global $conn;
	$uname = $username;
	$pwd   = $password;

	$cek_username = "SELECT * FROM users WHERE username = '$uname' ";
	$hasil        = $conn->query($cek_username);

	if ($hasil->num_rows > 0) {
		$get_password = $hasil->fetch_assoc();
		$respassword  = $get_password['password'];

		if ($pwd !== $respassword) {
			return false;
		} else {
			return true;
		}
		
	} else {
		return false;
	}

}

function logout($sess)
{
	unset($_SESSION[$sess]);
	session_destroy();
}