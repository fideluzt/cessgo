<?php include '../template/admin/head.php';

 ?>
<?php include '../template/admin/sidebar.php';
$kelas = $data_user[0]["kelas"];
$jadwal_kelas = getData("SELECT * FROM jadwal WHERE kelas = '$kelas'");

 ?>



    <!-- Main content -->
    <section class="content">
      <div class="container">
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahPrestasi">
          Tambah Data
        </button> -->
        <div class="row">
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> <b>Jadwal Pembelajaran CESSGO</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table id="data_user" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                     <th>No</th>
                      <th>Hari</th>
                      <th>Ruang</th>
                      <th>Kelas</th>
                      <th>Jam</th>
                      <th>Mentor</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php 
                    $no = 1;
                    foreach($jadwal_kelas as $jadwal) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $jadwal["hari"]; ?></td>
                        <td><?= $jadwal["ruang"]; ?></td>
                        <td><?= $jadwal["kelas"]; ?></td>
                        <td><?= $jadwal["waktu"]; ?></td>
                        <td><?= $jadwal["mentor"] === '' ? "-" : $jadwal["mentor"]; ?></td>
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