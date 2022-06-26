<?php 
include 'koneksi.php';
if(isset($_GET["aksi"])){
    if($_GET["aksi"] === "hapusPeserta"){
        $npm = $_GET["npm"];
         $cek = mysqli_query($conn, "DELETE FROM user WHERE npm = '$npm'");
        if($cek){
            setFlash("Dihapus", "True", "Mahasiswa");
            echo '<script>window.location="dashboard/data_peserta.php";</script>';
        }else{
            setFlash("Dihapus", "False", "Mahasiswa");
            echo '<script>window.location="dashboard/data_peserta.php";</script>';
        }
    }
    else if($_GET["aksi"] === "hapusPrestasi"){
        $id = $_GET["id"];
        $data_prestasi = getData("SELECT * FROM data_mahasiswa_prestasi WHERE id = '$id'")[0];
        $cek = mysqli_query($conn, "DELETE FROM data_mahasiswa_prestasi WHERE id = '$id'");
        if($cek){
            $nama_file = $data_prestasi["dokumentasi"];
            if(file_exists("img/bukti_prestasi/$nama_file")){
                unlink("img/bukti_prestasi/$nama_file");
            }
            setFlash("Dihapus", "True", "Prestasi");
            echo '<script>window.location="Admin/data_prestasi.php";</script>';
        }else{
            setFlash("Dihapus", "False", "Prestasi");
        }
    }
}

?>