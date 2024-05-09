<?php 
session_start();

if( !isset($_SESSION["user"])){
    header("Location: ../login/pages-login.php");
    exit;
}

include("../mesin/config1.php"); 

if( !isset($_GET['tanggal']) ){
	// kalau tidak ada id di query string
	header('Location: inputsiswa.php');
}

//ambil id dari query string
$tanggal = $_GET['tanggal'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM telat WHERE tanggal=$tanggal";
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
        <title>Admin - Edit Siswa</title>
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
                  <div class="state-information d-none d-sm-block">
                    <div class="state-graph">
                      <div id="header-chart-1"></div>
                      <div class="info">Kemandirian</div>
                    </div>
                    <div class="state-graph">
                      <div id="header-chart-2"></div>
                      <div class="info">Kerja Sama</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end row -->


            <div>
              <div class="row">
                <div class="col-12">
                  <div class="card m-b-20">
                    <div class="card-body">
                      <h2 class="mt-0 header-title container text-center mb-5"> Tabel Data Siswa</h2>
                      <table
                        id="datatable-buttons"
                        class="table table-striped table-bordered dt-responsive nowrap"
                        style="
                          border-collapse: collapse;
                          border-spacing: 0;
                          width: 100%;
                        "
                      >
                        <thead>
                          <tr>
                            <th>no</th>
                            <th>nama</th>
                            <th>kelas</th>
                          </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                          $no = 1;
                          $sql = "SELECT * FROM telat WHERE tanggal=$tanggal";
                          $query = mysqli_query($db, $sql);
                          
                          while($siswa = mysqli_fetch_array($query)){
                          ?>
                            <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $siswa['nama']; ?></td>
                            <td><?php echo $siswa['kelas']; ?></td>
                            </tr>
                            <?php }		
                          ?>
                        </tbody>
                        <p>Total Siswa Terlambat: <?php echo mysqli_num_rows($query) ?></p>
                      </table>
                  </div>
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->
            </div>
            <!-- end page content-->
          </div>
          <!-- container-fluid -->
        </div>

                <?php require("../layout/footeradmin.php");?>

    </body>

</html>