<?php 
session_start();
include '../template/admin/head.php' ?>
<?php include '../template/admin/sidebar.php' ?>
<?php 
$data_mahasiswa = getData("SELECT * FROM user WHERE level != 'admin' AND level != 'mentor'");
?>

   <!-- Main content -->
    <section class="content">
      <div class="container">
      
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> <b>Data Peserta Yang Mengikuti CESSGO</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                <table id="example1" class="table table-bordered table-hover">
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
                    foreach($data_mahasiswa as $mahasiswa) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $mahasiswa["username"]; ?></td>
                        <td><?= $mahasiswa["nama"]; ?></td>
                        <td><?= $mahasiswa["kelas"]; ?></td>
                        <td><?= $mahasiswa["email"]; ?></td>
                        <td>
                          <!-- <a href="#" class="badge badge-info">Lihat</a> -->
                          <a href="../proses_hapus.php?aksi=hapusPeserta&id=<?= $mahasiswa["id"]; ?>" class="badge badge-danger hapusMahasiswa" data-konfirmasi="<?= $mahasiswa["nama"]; ?>">Hapus</a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                     <th>No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Email</th>
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