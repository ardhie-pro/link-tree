<?php include("../mesin/config1.php"); ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Admin - Input Tanggal</title>
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
                      <h4 class="mt-0 header-title">Buttons example</h4>
                      <p class="text-muted m-b-30">
                        The Buttons extension for DataTables provides a common
                        set of options, API methods and styling to display
                        buttons on a page that will interact with a DataTable.
                        The core library provides the based framework upon which
                        plug-ins can built.
                      </p>
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
                            <th>Tanggal</th>
                            <th>Menu</th>
                        
                          </tr>
                        </thead>

                        <tbody>
                          <tr>
                               <?php
                                  $sql = "SELECT * FROM tanggal";
                                  $query = mysqli_query($db, $sql);
                                  
                                  while($tanggal = mysqli_fetch_array($query)){
                                    ?>
                                    <tr>
                                   <td><?php echo $tanggal['tanggal'] ;?></td>
                                    <td>
                                    <a class="btn btn-danger" href='../mesin/hapus.php?id="<?php echo $tanggal['id'];?>"'>Hapus</a>
                                    </td>
                                    </tr>
                                    <?php }		
                                 ?>
                          </tr>
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
                                                                    <form action="../mesin/inputtanggal.php" method="POST">
                                                                        <div class="mb-3">
                                                                            <label for="exampleInputEmail1" class="form-label">Masukan Tanggal</label>
                                                                            <input type="text" class="form-control" 
                                                                            name="tanggal" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                                            <div id="emailHelp" class="form-text">Masukan Tannggal</div>
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