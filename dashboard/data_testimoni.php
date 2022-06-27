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
                      <th>Title</th>
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
                        <td><?= $testimoni["title"]; ?></td>
                        <td><?= $testimoni["testimoni"]; ?></td>
                        <td>
                          <a href="../img/testimoni/<?= $testimoni["foto"]; ?>" class="badge badge-info">Lihat</a>
                        </td>
                        <td>
                          <?php if($testimoni["ket"] == 1): ?>
                            <span class="badge badge-success">Berhasil Di Publish</span>
                            <?php elseif($testimoni["ket"] == 2): ?>
                              <span class="badge badge-danger">Ditolak</span>
                              <?php else: ?>
                                <a href="../proses_hapus.php?aksi=publish&npm=<?= $testimoni["npm"]; ?>" class="badge badge-success" data-bs-toggle="modal">Publish</a>
                                <a href="../proses_hapus.php?aksi=tolak&npm=<?= $testimoni["npm"]; ?>"  class="badge badge-danger tombolKonfirmasi" data-konfirmasi="Data Testimoni <?= $testimoni["nama"]; ?> ">Tolak</a>
                          <?php endif; ?>
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