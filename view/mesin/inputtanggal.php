<?php

include("config1.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['inputsiswa'])){
	
	// ambil data dari formulir
	$tanggal = $_POST['tanggal'];
	

	
	// buat query
	$sql = "INSERT INTO tanggal (tanggal) VALUE ('$tanggal')";
	$query = mysqli_query($db, $sql);
	
	// apakah query simpan berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: ../admin/inputtanggal.php?status=sukses');
	} else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: index.php?status=gagal');
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
