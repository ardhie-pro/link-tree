<?php

include("config1.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['aksitidakhadir'])){
	
	// ambil data dari formulir
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$tanggal = $_POST['tanggal'];
	$tidakhadir = $_POST['tidakhadir'];

	
	// buat query
	$sql = "INSERT INTO tidakhadir (nama, kelas, tanggal, tidakhadir) VALUE ('$nama', '$kelas', '$tanggal', '$tidakhadir')";
	$query = mysqli_query($db, $sql);
	
	// apakah query simpan berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman index.php dengan status=sukses
		header('Location: ../admin/absensi.php?status=sukses');
	} else {
		// kalau gagal alihkan ke halaman indek.ph dengan status=gagal
		header('Location: absensi.php?status=gagal');
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
