<?php 
session_start();

if( !isset($_SESSION["user"])){
    header("Location: ../login/pages-login.php");
    exit;
}

include("../mesin/config1.php"); 

if( !isset($_GET['id']) ){
	// kalau tidak ada id di query string
	header('Location: inputlink.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM link WHERE id=$id";
$query = mysqli_query($db, $sql);
$link = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
	die("data tidak ditemukan...");
}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Admin - Edit link</title>
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
                
                  <h4 class="page-title">Data link</h4>
                  <ol class="breadcrumb">
                    <div class="text-center">
                            <!-- Small modal -->
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-center"> <i class="mdi mdi-plus"></i> Tambah Link</button>
                    </div>
                  </ol>

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

            <div class="page-content-wrapper">
              <div class="row">
                <div class="col-12">
                  <div class="card m-b-20">
                    <div class="card-body">
                      <h2 class="mt-0 header-title container text-center mb-5"> Form Edit Data link</h2>
                        <form action="../mesin/editlink.php" method="POST">
                          <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">judul link</label>
                              <input type="text" class="form-control" 
                              name="judul" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $link['judul'] ?>">
                              <div id="emailHelp" class="form-text">Masukan judul link</div>
			                        <input type="hidden" name="id" value="<?php echo $link['id'] ?>" />
                          </div>
                          <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">link</label>
                              <input type="text" 
                              name="link" class="form-control" id="exampleInputPassword1" value="<?php echo $link['link'] ?>">
                          </div>
                        
                          <input type="submit" value="Masukan" name="editlink" class="btn btn-primary"></input>
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
                      <h2 class="mt-0 header-title container text-center mb-5"> Tabel Data link</h2>
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
                            <th>judul</th>
                            <th>link</th>
                            <th>button</th>
                            <th>#</th>
                          </tr>
                        </thead>
                        
                        <tbody>
                        <?php
                          $no = 1;
                          $sql = "SELECT * FROM link";
                          $query = mysqli_query($db, $sql);
                          
                          while($link = mysqli_fetch_array($query)){
                          ?>

                            <tr>
                            
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $link['judul']; ?></td>
                            <td><?php echo $link['link']; ?></td>
                            <td>
                              <a class="btn btn-warning" href="../mesin/editlink.php?id='<?php echo $link['id'];?>'">Edit</a>
                            </td>
                            <td>
                              <a class="btn btn-danger" href="../mesin/hapuslink.php?id='<?php echo $link['id'];?>'">Hapus</a>
                            </td>
                            
                            </tr>
                            <?php }		
                          ?>
                        </tbody>
                      </table>
                      <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0">Tambah Link</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="../mesin/inputlink.php" method="POST">
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">judul link</label>
                                                <input type="text" class="form-control" 
                                                name="judul" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                <div id="emailHelp" class="form-text">Masukan judul link</div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputPassword1" class="form-label">link</label>
                                                <input type="text" 
                                                name="link" class="form-control" id="exampleInputPassword1">
                                            </div>
                                          
                                            <input type="submit" value="Masukan" name="inputlink" class="btn btn-primary"></input>
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