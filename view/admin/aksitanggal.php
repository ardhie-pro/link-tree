<?php 
session_start();

if( !isset($_SESSION["user"])){
    header("Location: ../login/pages-login.php");
    exit;
}

include("../mesin/config1.php"); 

if( !isset($_GET['tanggal']) ){
	// kalau tidak ada id di query string
	header('Location: tanggal.php');
}

//ambil id dari query string
$tanggal = $_GET['tanggal'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM tanggal WHERE tanggal=$tanggal";
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
                      <h2 class="mt-0 header-title container text-center mb-5"> Form Edit Data Siswa</h2>
                        <form action="../mesin/editsiswa.php" method="POST">
                          <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Nama Siswa</label>
                              <input type="text" class="form-control" 
                              name="nama" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $tanggal['tanggal'] ?>">
                              <div id="emailHelp" class="form-text">Masukan Nama Siswa</div>
			                      
                          </div>
                         
                             
                        
                          <input type="submit" value="Masukan" name="editsiswa" class="btn btn-primary"></input>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->
            </div>

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
                            <th>button</th>
                            <th>#</th>
                          </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                          $no = 1;
                          $sql = "SELECT * FROM tanggal";
                          $query = mysqli_query($db, $sql);
                          
                          while($siswa = mysqli_fetch_array($query)){
                          ?>

                            <tr>
                            
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $siswa['tanggal']; ?></td>

                            
                            </tr>
                            <?php }		
                          ?>
                        </tbody>
                      </table>
                      <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0">Center modal</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../mesin/inputsiswa.php" method="POST">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Nama Siswa</label>
                                                <input type="text" class="form-control" 
                                                name="nama" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                <div id="emailHelp" class="form-text">Masukan Nama Siswa</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">Kelas</label>
                                                <input type="text" 
                                                name="kelas" class="form-control" id="exampleInputPassword1">
                                            </div>
                                          
                                            <input type="submit" value="Masukan" name="inputsiswa" class="btn btn-primary"></input>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </div>
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