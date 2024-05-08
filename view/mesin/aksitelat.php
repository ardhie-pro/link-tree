<?php

include("config1.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['aksitelat'])){
	
	// ambil data dari formulir
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$tanggal = $_POST['tanggal'];
	$telat = $_POST['telat'];

	
	// buat query
	$sql = "INSERT INTO telat (nama, kelas, tanggal, telat) VALUE ('$nama', '$kelas', '$tanggal', '$telat')";
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
