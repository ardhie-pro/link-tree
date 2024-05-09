<?php 
session_start();

if( !isset($_SESSION["user"])){
    header("Location: ../login/pages-login.php");
    exit;
}
include("../mesin/config1.php"); 
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Admin - Kehadiran Siswa</title>
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
                  <ol class="breadcrumb">
                    <div class="text-center">
                            <!-- Small modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-center">Center modal</button>
                    </div>
                  </ol>

                  <div class="state-information d-none d-sm-block">
                    <div class="state-graph">
                      <div id="header-chart-1"></div>
                      <div class="info">Balance $ 2,317</div>
                    </div>
                    <div class="state-graph">
                      <div id="header-chart-2"></div>
                      <div class="info">Item Sold 1230</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end row -->

            <div class="page-content-wrapper">
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
                            <th>Tanggal</th>
                            <th>Terlambat</th>
                            <th>Tidak Hadir</th>
                          </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                          $no = 1;
                          $sql = "SELECT * FROM tanggal";
                          $query = mysqli_query($db, $sql);
                          while($tanggal = mysqli_fetch_array($query)){
                          ?>
                            <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $tanggal['tanggal']; ?></td>
                            <td>
                            <a class="btn btn-warning" href="datatelat.php?tanggal='<?php echo $tanggal['tanggal'];?>'">Telat</a>
                            </td>
                            <td>
                            <a class="btn btn-danger" href="tidakhadirsiswa.php?tanggal='<?php echo $tanggal['tanggal'];?>'">Tidak Hdir</a>
                            </td>
                            
                            </tr>
                            <?php }		
                          ?>
                        </tbody>
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