<?php 
// mengaktifkan session pada php
session_start();

if (!isset($_SESSION)) {
  header("Location: ../../index.php");
  exit;
}
// menghubungkan php dengan koneksi database
include 'function.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'");
$row = mysqli_fetch_assoc($result);

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from users where username='$username'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
	$_SESSION['login'] = true;
	// cek jika user login sebagai admin

	
		if($data['idStatusPegawai']=="1"){

		// buat session login dan username
		
		if (password_verify($password, $row['password'])) { //memverifikasi apakah enkripsi password login sesuai
			$_SESSION['username'] = $username;
			$_SESSION['idStatusPegawai'] = "1";
			if (isset($_SESSION["login"])) {
				header("location:../submain/dasboard-admin/admin.php");
			}
		// alihkan ke halaman dashboard admin
		
		} else {
			header("location:../index.php?pesan=gagal");
		}
		
	// cek jika user login sebagai pegawai
	}else if($data['idStatusPegawai']=="2"){
		
		if (password_verify($password, $row['password'])) {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['idStatusPegawai'] = "2";
		

		// alihkan ke halaman dashboard pegawai
			if (isset($_SESSION["login"])) {
				header("location:../submain/dasboard-frontoffice/FO.php");
			} 
		}else {
		header("location:../index.php?pesan=gagal");
		}
	
 
	// cek jika user login sebagai pengurus
	}else if($data['idStatusPegawai']=="3"){

		if (password_verify($password, $row['password'])) {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['idStatusPegawai'] = "3";
		
		// alihkan ke halaman dashboard pengurus
			if (isset($_SESSION["login"])) {
			header("location:../submain/dasboard-backoffice/BO.php");
			} 
		}	else {
		header("location:../index.php?pesan=gagal");
		}
 
	}else if($data['idStatusPegawai']=="4"){

		if (password_verify($password, $row['password'])) {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['idStatusPegawai'] = "4";
	

		// alihkan ke halaman dashboard pengurus
		if (isset($_SESSION["login"])) {
		header("location:../submain/dasboard-lab/StaffLab.php");
		} 
	}else {
		header("location:../index.php?pesan=gagal");
		}
 
	}else{
		// alihkan ke halaman login kembali
		header("location:../index.php?pesan=gagal");
	}	
}else{
	header("location:../index.php?pesan=gagal");
}

?>