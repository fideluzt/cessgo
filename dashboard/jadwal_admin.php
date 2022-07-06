<?php include '../template/admin/head.php';

 ?>
<?php include '../template/admin/sidebar.php';
$jadwal_kelas = getData("SELECT * FROM jadwal");
$data_mentor = getData("SELECT * FROM user WHERE level = 'mentor'");
$bidang_studi = getData("SELECT * FROM bidang_studi");


// Tambah Mentor
if(isset($_POST["btn_tambah"])){
  if(tambahMentor($_POST) > 0){
      setFlash("Ditambahkan", "True", "Mentor");
      echo '<script>window.location="jadwal_admin.php";</script>';
    }else{
    setFlash("Ditambahkan", "False", "Mentor");
    echo '<script>window.location="jadwal_admin.php";</script>';
  }
}
// Tambah Jadwal
if(isset($_POST["btn_tambah_jadwal"])){
  // var_dump($_POST);
  // die();
  if(tambahJadwal($_POST) > 0){
      setFlash("Ditambahkan", "True", "Jadwal");
      echo '<script>window.location="jadwal_admin.php";</script>';
    }else{
    setFlash("Ditambahkan", "False", "Jadwal");
    echo '<script>window.location="jadwal_admin.php";</script>';
  }
}
// Edit Jadwal
if(isset($_POST["btn_update_jadwal"])){
  // var_dump($_POST);
  // die();
  if(updateJadwal($_POST) > 0){
      setFlash("Diupdate", "True", "Jadwal");
      echo '<script>window.location="jadwal_admin.php";</script>';
    }else{
    setFlash("Diupdate", "False", "Jadwal");
    echo '<script>window.location="jadwal_admin.php";</script>';
  }
}
// $nama_mentor = "Irpansyah";
// $npm_mentor = "062140720450";
// $email_mentor = "irpansyah810@gmail.com";
// $password = random_int(100000, 1000000);
// $pesan = "$password";
// $resp = notifikasi($nama_mentor, $email_mentor, "Mentor Password - CESSGO", $pesan );
// var_dump(json_decode($resp, true));
// die();
// $resp = json_decode($resp, true);
// if($resp["statusCode"] == 200){
//   setFlash("Dikirimkan", "True", "Email");
// }

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
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahJadwal">
                  <i class="fa-solid fa-circle-plus"></i> Tambah Jadwal
                </button>
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
                      <th>Jumlah Peserta</th>
                      <th>Aksi</th>
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
                        <td><?= $jadwal["waktu"]; ?> WIB</td>
                        <td><?= $jadwal["mentor"] === '' ? "-" : $jadwal["mentor"]; ?></td>
                        <td>
                          <?php $kelas = $jadwal["kelas"]; ?>
                           <?= count(getData("SELECT * FROM user WHERE kelas = '$kelas' AND level != 'mentor'")); ?> Orang
                        </td>
                        <td>
                            <a href="#" class="badge badge-info" data-bs-toggle="modal" data-bs-target="#jadwalKelas<?= $jadwal["id"]; ?>"><i class="fa-solid fa-pen-to-square"></i></a>

                            <div class="modal fade" id="jadwalKelas<?= $jadwal["id"]; ?>" tabindex="-1" aria-labelledby="editjadwalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="editJadwalLabel">Edit Jadwal Kelas</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <form action="" method="post">
                                        <div class="modal-body">
                                          <div class="mb-3">
                                            <label for="hari" class="form-label">Hari</label>
                                            <input type="text" readonly class="form-control" value="<?= $jadwal["hari"]; ?>" id="hari" name="hari">
                                            <input type="hidden" value="<?= $jadwal["id"]; ?>" name="id_jadwal">
                                            
                                          </div>
                                          <div class="mb-3">
                                            <label for="ruang" class="form-label">Ruang</label>
                                            <select class="form-select" id="ruang"  name="ruang" aria-label="Default select example" required>
                                              <option value="">--Pilih Ruang--</option>
                                              <option <?= $jadwal["ruang"] == "Ruang 1" ? "selected" : "" ?> value="Ruang 1">Ruang 1</option>
                                              <option <?= $jadwal["ruang"] == "Ruang 2" ? "selected" : "" ?> value="Ruang 2">Ruang 2</option>
                                              <option <?= $jadwal["ruang"] == "Ruang 3" ? "selected" : "" ?> value="Ruang 3">Ruang 3</option>
                                              <option <?= $jadwal["ruang"] == "Ruang 4" ? "selected" : "" ?> value="Ruang 4">Ruang 4</option>
                                              <option <?= $jadwal["ruang"] == "Ruang 5" ? "selected" : "" ?> value="Ruang 5">Ruang 5</option>
                                              <option <?= $jadwal["ruang"] == "Ruang 6" ? "selected" : "" ?> value="Ruang 6">Ruang 6</option>
                                            </select>
                                          </div>
                                          <div class="mb-3">
                                            <label for="kelas" class="form-label">Bidang Studi / Kelas</label>
                                            <select class="form-select" id="kelas"  name="kelas" aria-label="Default select example" required>
                                              <option value="">--Pilih Ruang--</option>
                                              <?php 
                                              foreach($bidang_studi as $studi) : ?>
                                                    <option <?= $studi["nama_bidang"] == $jadwal["kelas"] ? "selected" : "" ?> value="<?= $studi["nama_bidang"]; ?>"><?= $studi["nama_bidang"]; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                          </div>
                                          <div class="mb-3">
                                            <label for="jam" class="form-label">Waktu / Jam</label>
                                            <input type="time" value="<?= $jadwal["waktu"]; ?>"  class="form-control" name="jam" id="jam">
                                          </div>
                                          <div class="mb-3">
                                            <label for="mentor" class="form-label">Mentor</label>
                                            <select class="form-select" id="mentor"  name="mentor" aria-label="Default select example" required>
                                            <option value="-">--Pilih Mentor--</option>
                                              <?php 
                                                foreach($data_mentor as $mentor) : ?>
                                                      <option <?= $mentor["nama"] == $jadwal["mentor"] ? "selected" : "" ?> value="<?= $mentor["nama"]; ?>"><?= $mentor["nama"]; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                          <button type="submit" name="btn_update_jadwal" class="btn btn-primary">Update</button>
                                        </div>
                                      </div>
                                  </form>
                                  </div>
                                </div>




                            <a href="../proses_hapus.php?aksi=hapusJadwal&id=<?= $jadwal["id"]; ?>"  class="badge badge-danger tombolKonfirmasi" data-konfirmasi="Jadwal Kelas <?= $jadwal["kelas"]; ?> "><i class="fa-solid fa-trash"></i></a>
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
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"> <b>Data Mentor CESSGO</b></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                 <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahMentor">
                  <i class="fa-solid fa-circle-plus"></i> Tambah Mentor
                </button>
                <div class="table-responsive">
                  <table id="data_user" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Npm</th>
                      <th>Nama</th>
                      <th>Kelas</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no = 1;
                    foreach($data_mentor as $mentor) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $mentor["username"]; ?></td>
                        <td><?= $mentor["nama"]; ?></td>
                        <td><?= $mentor["kelas"]; ?></td>
                        <td><?= $mentor["email"]; ?></td>
                        <td>
                            <a href="../proses_hapus.php?aksi=hapusMentor&id=<?= $mentor["id"]; ?>"  class="badge badge-danger tombolKonfirmasi" data-konfirmasi="Mentor <?= $mentor["nama"]; ?> "><i class="fa-solid fa-trash"></i></a>
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
        <!-- Modal Tambah Mentor-->
<div class="modal fade" id="tambahMentor" tabindex="-1" aria-labelledby="tambahMentorLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahMentorLabel">Tambah Mentor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="mb-3">
            <label for="npm_mentor" class="form-label">NPM Mentor</label>
            <input type="text" class="form-control" placeholder="Masukan NPM Mentor..." name="npm_mentor" id="npm_mentor" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="nama_mentor" class="form-label">Nama Mentor</label>
            <input type="text" class="form-control" placeholder="Masukan Nama Mentor..." name="nama_mentor" id="nama_mentor" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="kelas" class="form-label">Kelas / Bidang Studi</label>
            <select class="form-select" id="kelas" name="kelas" aria-label="Default select example" required>
             <option value="">--Pilih Bidang--</option>
                 <?php foreach($bidang_studi as $bidang) : ?>
                      <option value="<?= $bidang["nama_bidang"]; ?>"><?= $bidang["nama_bidang"]; ?></option>
                <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="email_mentor" class="form-label">Email Mentor</label>
            <input type="email" class="form-control" placeholder="Masukan Email Mentor..." name="email_mentor" id="email_mentor" aria-describedby="emailHelp" required>
            <div id="email_mentor" class="form-text text-danger fw-bold">*Mohon isi dengan benar karena username dan password akan dikirim ke email</div>
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
        <!-- Modal Tambah Jadwal-->
<div class="modal fade" id="tambahJadwal" tabindex="-1" aria-labelledby="tambahJadwalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tambahJadwalLabel">Tambah Jadwal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="mb-3">
            <label for="hari" class="form-label">Hari</label>
            <input type="text" readonly value="Sabtu" class="form-control" placeholder="Masukan NPM Mentor..." name="hari" id="hari" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="ruang" class="form-label">Ruang</label>
            <select class="form-select" id="ruang" name="ruang" aria-label="Default select example" required>
             <option value="">--Pilih Ruang--</option>
                 <?php 
                 $data_ruang = ["Ruang 1", "Ruang 2", "Ruang 3", "Ruang 4", "Ruang 5", "Ruang 6"];
                 foreach($data_ruang as $studi) : ?>
                      <option value="<?= $studi; ?>"><?= $studi; ?></option>
                <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="kelas" class="form-label">Bidang Studi / Kelas</label>
            <select class="form-select" id="kelas" name="kelas" aria-label="Default select example" required>
             <option value="">--Pilih Bidang Studi / Kelas--</option>
                 <?php 
                 $data_ruang = ["Ruang 1", "Ruang 2", "Ruang 3", "Ruang 4", "Ruang 5", "Ruang 6"];
                 foreach($bidang_studi as $studi) : ?>
                      <option value="<?= $studi["nama_bidang"]; ?>"><?= $studi["nama_bidang"]; ?></option>
                <?php endforeach; ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="jam" class="form-label">Jam</label>
            <input type="time" class="form-control" placeholder="Masukan Jam..." name="jam" id="jam" aria-describedby="emailHelp" required>
          </div>
          <div class="mb-3">
            <label for="mentor" class="form-label">Mentor</label>
            <select class="form-select" id="mentor" name="mentor" aria-label="Default select example" required>
             <option value="-">--Pilih Mentor--</option>
                 <?php 
                 foreach($data_mentor as $mentor) : ?>
                      <option value="<?= $mentor["nama"]; ?>"><?= $mentor["nama"]; ?></option>
                <?php endforeach; ?>
            </select>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
          <button type="submit" name="btn_tambah_jadwal" class="btn btn-primary">Tambah</button>
        </div>
      </div>
  </form>
  </div>
</div>
  </div>
<?php include '../template/admin/footer.php' ?>