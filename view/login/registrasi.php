<?php

include("config1.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['registrasi'])){
	
	// ambil data dari formulir
	$username = $_POST['username'];
	$password = $_POST['password'];
	$nama = $_POST['nama'];

	
	// buat query
	$sql = "INSERT INTO users (username, password, nama) VALUE ('$username', '$password', '$nama')";
	$query = mysqli_query($db, $sql);
	
	// apakah query simpan berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: ../admin/registrasi.php?status=sukses');
	} else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: index.php?status=gagal');
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
