<?php include '../template/admin/head.php';

 ?>
<?php include '../template/admin/sidebar.php';
$data_testimoni = getData("SELECT * FROM testimoni");

 ?>



    <!-- Main content -->
    <section class="content">
      <div class="container">
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahPrestasi">
          Tambah Data
        </button> -->
        <div class="row">
          <div class="col-lg-10">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> <b>Data Testimoni Peserta CESSGO</b></h3>
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
                      <th>Kelas</th>
                      <th>Testimoni</th>
                      <th>Foto</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach($data_testimoni as $testimoni) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $testimoni["npm"]; ?></td>
                        <td><?= $testimoni["nama"]; ?></td>
                        <td><?= $testimoni["ket"]; ?></td>
                        <td><?= $testimoni["testimoni"]; ?></td>
                        <td>
                          <a href="../img/testimoni/<?= $testimoni["foto"]; ?>" class="badge badge-info">Lihat</a>
                        </td>
                        <td>
                            <a href="#" class="badge badge-info" data-bs-toggle="modal" data-bs-target="#jadwalKelas<?= $jadwal["id"]; ?>">Publish</a>
                            <a href="../proses_hapus.php?aksi=hapusPrestasi&id=<?= $jadwal["id"]; ?>"  class="badge badge-danger tombolKonfirmasi" data-konfirmasi="Jadwal Kelas <?= $jadwal["kelas"]; ?> ">Hapus</a>
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
          
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
<?php include '../template/admin/footer.php' ?>