<?php 
session_start();
include '../template/admin/head.php' ?>
<?php include '../template/admin/sidebar.php' ?>
<?php 

$data_bidang = getData("SELECT * FROM bidang_studi");
?>

   <!-- Main content -->
    <section class="content">
      <div class="container">
      
        <div class="row">
          <?php foreach($data_bidang as $bidang) : ?>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"> Data Mentor <b><?= $bidang["nama_bidang"]; ?></b></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  
                  <table class="table table-bordered table-hover table-responsive">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>NPM</th>
                      <th>Nama</th>
                      <th>Kelas</th>
                      <th>Email</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      $kelas = $bidang["nama_bidang"];
                      $data_mentor = getData("SELECT * FROM user WHERE level = 'mentor' AND kelas = '$kelas'");
                      foreach($data_mentor as $mentor) : ?>
                        <tr>
                          <td><?= $no++; ?></td>
                          <td><?= $mentor["username"]; ?></td>
                          <td><?= $mentor["nama"]; ?></td>
                          <td><?= $mentor["kelas"]; ?></td>
                          <td><?= $mentor["email"]; ?></td>
                          <td>
                            <!-- <a href="#" class="badge badge-info">Lihat</a> -->
                            <a href="../proses_hapus.php?aksi=hapusPeserta&id=<?= $mentor["id"]; ?>" class="badge badge-danger hapusMahasiswa" data-konfirmasi="<?= $mentor["nama"]; ?>">Hapus</a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          <?php endforeach; ?>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
<?php include '../template/admin/footer.php' ?>