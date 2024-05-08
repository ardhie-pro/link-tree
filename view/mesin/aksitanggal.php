<?php

include("config1.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['mulai'])){
	
	// ambil data dari formulir
	
	$tanggal = $_POST['tanggal'];

	
	// buat query update
	$sql = "UPDATE siswa SET tanggal='$tanggal'";
	$query = mysqli_query($db, $sql);
	
	// apakah query update berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman list-siswa.php
		header('Location: ../admin/inputsiswa.php?status=sukses');
	} else {
		// kalau gagal tampilkan pesan
		die("Gagal menyimpan perubahan...");
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
