<?php include '../template/admin/head.php';
$data_user = getData("SELECT * FROM tbl_login WHERE `level` = '1'");
$data_dosen = getData("SELECT * FROM tbl_login WHERE `level` = '3'");
 ?>
<?php include '../template/admin/sidebar.php'
 ?>

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> <b>Data Akun Mahasiswa</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="data_user" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Usernmae</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach($data_user as $user) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $user["npm"]; ?></td>
                        <td><?= $user["username"]; ?></td>
                        <td>
                          <a href="#" class="badge badge-info">Nonaktifkan</a>
                          <a href="#" class="badge badge-danger">Hapus</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Usernmae</th>
                    <th>Aksi</th>
                  
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> <b>Data Akun Dosen</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="data_user" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>NIDN</th>
                    <th>Username</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach($data_dosen as $dosen) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $dosen["npm"]; ?></td>
                        <td><?= $dosen["username"]; ?></td>
                        <td>
                          <a href="#" class="badge badge-info">Nonaktifkan</a>
                          <a href="#" class="badge badge-danger">Hapus</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>NIDN</th>
                    <th>Username</th>
                    <th>Aksi</th>
                  
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php include '../template/admin/footer.php' ?>