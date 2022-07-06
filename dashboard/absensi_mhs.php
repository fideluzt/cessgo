<?php include '../template/admin/head.php';

 ?>
<?php include '../template/admin/sidebar.php';
$kelas = $data_user[0]["kelas"];

$jadwal_kelas = getData("SELECT * FROM jadwal WHERE kelas = '$kelas'");
// $data_kelas = getData("SELECT * FROM jadwal WHERE kelas = '$kelas'");
$data_mahasiswa = getData("SELECT * FROM user WHERE kelas = '$kelas'");

 ?>



    <!-- Main content -->
    <section class="content">
      <div class="container">
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahPrestasi">
          Tambah Data
        </button> -->
        <div class="row">
          <div class="col-lg-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> <b>Absensi Kelas <?= $data_user[0]["kelas"]; ?> | CESSGO</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table id="data_user" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                     <th>No</th>
                      <th>NPM</th>
                      <th>Nama</th>
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
                        <td>
                          <button class="btn btn-success hadir">Hadir</button>
                          <button class="btn btn-warning izin">Izin</button>
                          <button class="btn btn-danger alfa">Alfa</button>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                  </div>
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
