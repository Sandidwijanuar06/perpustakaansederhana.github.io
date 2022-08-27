<?php
session_start();

// koneksi ke db
$con = mysqli_connect('localhost','root','','perpustakaan');

//function login
if(isset($_POST['login'])){
	$role = $_POST['role'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$namapetugas = $_POST['namapetugas'];

	$query = mysqli_query($con,"SELECT * FROM login WHERE namapetugas='$namapetugas' and username='$username' and password='$password' and role='$role'");
	$hitung   = mysqli_num_rows($query);

	if($hitung > 0){

		$data = mysqli_fetch_array($query);

		// jika admin
		if($data['role']=="Admin"){
			session_start();
			$_SESSION['foto'] = $data ['foto'];
			$_SESSION['role'] = $admin;
			$_SESSION['namapetugas'] = $namapetugas;
			$_SESSION['username'] = "username";
			$_SESSION['password'] = "password";

			header('location:admin/dashboard.php');

		} else if($data['role']=="Oprator"){
			session_start();
			$_SESSION['foto'] = $data ['foto'];
			$_SESSION['role'] = $oprator;
			$_SESSION['namapetugas'] = $namapetugas;
			$_SESSION['username'] = "username";
			$_SESSION['password'] = "password";

			header('location:oprator/dashboard.php');

	} else {
		header('location:login.php?pesan=gagal');
	}
} else {
	header('location:login.php?pesan=gagal');
}
}

// function tampilkan_nama($nama){
// 	$query  = "SELECT * FROM login WHERE id=$nama";
// 	return result($query);
//   }



?>
