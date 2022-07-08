<?php 
// if(!session_start()) session_id();
include '../template/admin/head.php';

 ?>
<?php include '../template/admin/sidebar.php';
$daftar_bidang = getData("SELECT * FROM bidang_studi");
// $data_mentor = getData("SELECT * FROM user WHERE level = 'mentor'");

// setFlash("Ditambahkan", "True", "Bidang_Studi");
// Tambah Bidang Studi
if(isset($_POST["btn_tambah"])){
  if(tambahBidangStudi($_POST) > 0){
      echo '<script>window.location="daftar_bidang.php";</script>';
    }else{
    setFlash("Ditambahkan", "False", "Bidang_Studi");
    echo '<script>window.location="daftar_bidang.php";</script>';
  }
}


// Edit Bidang Studi
if(isset($_POST["btn_update"])){
  // var_dump($_POST);
  // die();
  if(updateBidangStudi($_POST) > 0){
      setFlash("Diupdate", "True", "Bidang_Studi");
      echo '<script>window.location="daftar_bidang.php";</script>';
    }else{
    setFlash("Diupdate", "False", "Bidang_Studi");
    echo '<script>window.location="daftar_bidang.php";</script>';
  }
}
 ?>



    <!-- Main content -->
    <section class="content">
      <div class="container">
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahPrestasi">
          Tambah Data
        </button> -->
        <div class="row">
          <div class="col">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> <b>Daftar Bidang Studi CESSGO</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahBidang">
                  <i class="fa-solid fa-circle-plus"></i> Tambah Bidang
                </button>
                <div class="table-responsive">
                  <table id="data_user" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Bidang</th>
                      <th>Deskripsi</th>
                      <th>Kuota</th>
                      <th>Foto</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach($daftar_bidang as $bidang) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $bidang["nama_bidang"]; ?></td>
                        <td><?= $bidang["deskripsi"]; ?></td>
                        <td><?= $bidang["kuota"]; ?> Orang</td>
                       <td><a href="../img/bidang_studi/<?= $bidang["foto"]; ?>" ><i class="fa-solid fa-eye"></i></a></td>
                        <td>
                            <a href="#" class="badge badge-info" data-bs-toggle="modal" data-bs-target="#editBidang<?= $bidang["id"]; ?>"><i class="fa-solid fa-pen-to-square"></i></a>

                            <div class="modal fade" id="editBidang<?= $bidang["id"]; ?>" tabindex="-1" aria-labelledby="editBidangLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="editBidangLabel">Edit Bidang Studi</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <form action="" method="post" enctype="multipart/form-data">
                                    <div class="modal-body">
                                      <div class="mb-3">
                                        <label for="nama_bidang" class="form-label">Nama Bidang</label>
                                        <input type="hidden"  name="id" value="<?= $bidang["id"]; ?>">
                                        <input type="text" class="form-control" placeholder="Masukan Nama Bidang..." name="nama_bidang" id="nama_bidang" value="<?= $bidang["nama_bidang"]; ?>" aria-describedby="emailHelp" required>
                                      </div>
                                      <div class="mb-3">
                                        <label for="deskripsi_bidang" class="form-label">Deskripsi Bidang</label>
                                      <textarea name="deskripsi_bidang" placeholder="Masukan Deskripsi Bidang..." id="deskripsi" class="form-control" cols="10" rows="5"><?= $bidang["deskripsi"]; ?></textarea>
                                      </div>
                                      <!-- <div class="mb-3">
                                            <label for="mentor" class="form-label">Mentor</label>
                                            <select class="form-select" id="mentor"  name="mentor" aria-label="Default select example" required>
                                            <option value="-">--Pilih Mentor--</option>
                                              <?php 
                                                foreach($data_mentor as $mentor) : ?>
                                                      <option <?= $mentor["nama"] == $bidang["mentor"] ? "selected" : "" ?> value="<?= $mentor["nama"]; ?>"><?= $mentor["nama"]; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                          </div> -->
                                      <div class="mb-3">
                                        <label for="kuota" class="form-label">Kuota Kelas</label>
                                        <input type="number" class="form-control" value="<?= $bidang["kuota"]; ?>" placeholder="Masukan Jumlah Kuota Kelas..." name="kuota" id="kuota" aria-describedby="emailHelp" required>
                                      </div>
                                      <div class="mb-3">
                                        <label for="foto" class="form-label">Foto</label>
                                        <input type="file" class="form-control" name="gambar" id="foto" aria-describedby="emailHelp">
                                        <input type="hidden" class="form-control" value="<?= $bidang["foto"]; ?>" name="gambar_lama" >
                                      </div>
                                      <div class="mb-3">
                                        <label for="video" class="form-label">Video</label>
                                        <input type="text" placeholder="Masukan Nama Video" class="form-control" value="<?= $bidang["video"]; ?>" name="video" id="video" >
                                      </div>

                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                      <button type="submit" name="btn_update" class="btn btn-primary">Update</button>
                                    </div>
                                  </div>
                              </form>
                              </div>
                            </div>




                            <a href="../proses_hapus.php?aksi=hapusBidang&id=<?= $bidang["id"]; ?>"  class="badge badge-danger tombolKonfirmasi" data-konfirmasi="Bidang Studi <?= $bidang["nama_bidang"]; ?> "><i class="fa-solid fa-trash"></i></a>
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
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
       <!-- Modal Tambah Bidang-->
<div class="modal fade" id="tambahBidang" tabindex="-1" aria-labelledby="tambahBidangLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahBidangLabel">Tambah Bidang Studi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="mb-3">
            <label for="nama_bidang" class="form-label">Nama Bidang</label>
            <input type="text" class="form-control" placeholder="Masukan Nama Bidang..." name="nama_bidang" id="nama_bidang" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="deskripsi_bidang" class="form-label">Deskripsi Bidang</label>
           <textarea name="deskripsi_bidang" placeholder="Masukan Deskripsi Bidang..." id="deskripsi" class="form-control" cols="10" rows="5"></textarea>
          </div>
          <div class="mb-3">
            <label for="kuota" class="form-label">Kuota Kelas</label>
            <input type="number" class="form-control" placeholder="Masukan Jumlah Kuota Kelas..." name="kuota" id="kuota" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
            <input type="file" class="form-control" name="gambar" id="foto" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="video" class="form-label">Video</label>
            <input type="text" class="form-control" placeholder="Masukan Nama Video..." name="video" id="video" aria-describedby="emailHelp" required>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
          <button type="submit" name="btn_tambah" class="btn btn-primary">Tambah</button>
        </div>
      </div>
  </form>
  </div>
</div>
  </div>
<?php include '../template/admin/footer.php' ?>