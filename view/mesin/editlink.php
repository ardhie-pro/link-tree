<?php

include("config1.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['editlink'])){
	
	// ambil data dari formulir
	$id = $_POST['id'];
	$judul = $_POST['judul'];
	$link = $_POST['link'];
	
	// buat query update
	$sql = "UPDATE link SET judul='$judul', link='$link' WHERE id=$id";
	$query = mysqli_query($db, $sql);
	
	// apakah query update berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman list-link.php
		header('Location: ../admin/inputlink.php?status=sukses');
	} else {
		// kalau gagal tampilkan pesan
		die("Gagal menyimpan perubahan...");
	}
	
	
} else {
	die("Akses dilarang...");
}

?>
