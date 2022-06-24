<?php 
session_start();
include '../template/admin/head.php' ?>
<?php include '../template/admin/sidebar.php' ?>
<?php 
// include '../koneksi.php';
$data_mahasiswa = getData("SELECT * FROM data_mahasiswa");


?>

   <!-- Main content -->
    <section class="content">
      <div class="container">
      
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> <b>Data Mahasiswa Yang Mengikuti UKM/ORMAWA/KOMUNITAS</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="example1" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>NAO</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach($data_mahasiswa as $mahasiswa) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $mahasiswa["nao"]; ?></td>
                        <td><?= $mahasiswa["npm"]; ?></td>
                        <td><?= $mahasiswa["nama"]; ?></td>
                        <td>
                          <?php
                          $npm = $mahasiswa["npm"];
                            $data_user = getData("SELECT * FROM tbl_login WHERE npm = '$npm'");
                            // var_dump($data_user);
                            // die();
                            if(!empty($data_user)){
                              echo '<span class="badge badge-success">Terdaftar</span>';
                            }else {
                              echo '<span class="badge badge-warning">Belum Terdaftar</span>';
                            }
                          ?>
                        </td>
                        <td>
                          <a href="#" class="badge badge-info">Lihat</a>
                          <a href="../proses_hapus.php?aksi=hapusMahasiswa&npm=<?= $mahasiswa["npm"]; ?>" class="badge badge-danger hapusMahasiswa" data-konfirmasi="<?= $mahasiswa["nama"]; ?>">Hapus</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No</th>
                    <th>NAO</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Status</th>
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