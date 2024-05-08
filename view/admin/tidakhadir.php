<?php 
session_start();

if( !isset($_SESSION["user"])){
    header("Location: ../login/pages-login.php");
    exit;
}

include("../mesin/config1.php"); 

if( !isset($_GET['id']) ){
	// kalau tidak ada id di query string
	header('Location: absensi.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
	die("data tidak ditemukan...");
}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Admin - Mulai Absensi</title>
        <?php require("../layout/headadmin.php");?>
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <?php require("../layout/navadmin.php");?>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="page-title-box">
                
                  <h4 class="page-title">Data Siswa</h4>
                  
                  
                </div>
              </div>
            </div>
            <!-- end row -->

            <div class="page-content-wrapper">
              <div class="row">
                <div class="col-12">
                  <div class="card m-b-20">
                    <div class="card-body">
                      <h1 class="mt-0 header-title container text-center mb-5">Ananda <?php echo $siswa['nama'] ?> Dinyatakan Tidak Hadir</h1>
                        <form action="../mesin/aksitidakhadir.php" method="POST">
                          <div class="mb-3">
                              <input type="text" class="form-control" 
                              name="nama" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $siswa['nama'] ?>">
                          </div>
                          <div class="mb-3">
                              <input type="text" class="form-control" 
                              name="kelas" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $siswa['kelas'] ?>">
                          </div>
                          <div class="mb-3">
                              <input type="text" class="form-control" 
                              name="tanggal" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $siswa['tanggal'] ?>">
                          </div>
                          <div class="mb-3">
                              <input type="text" class="form-control" 
                              name="tidakhadir" id="exampleInputEmail1" aria-describedby="emailHelp" value="Tidak Hadir">
                          </div>
                          <input type="submit" value="Lanjutkan" name="aksitidakhadir" class="btn btn-danger text-center"></input>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->
            </div>
            <div>
              <!-- end row -->
            </div>
            <!-- end page content-->
          </div>
          <!-- container-fluid -->
        </div>

                <?php require("../layout/footeradmin.php");?>

    </body>

</html>