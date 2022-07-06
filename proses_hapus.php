<?php 
include 'koneksi.php';
if(isset($_GET["aksi"])){
    if($_GET["aksi"] === "hapusPeserta"){
        $npm = $_GET["npm"];
        $id = $_GET["id"];
         $cek = mysqli_query($conn, "DELETE FROM user WHERE id = '$id'");
        if($cek){
            setFlash("Dihapus", "True", "Mahasiswa");
            echo '<script>window.location="dashboard/data_peserta.php";</script>';
        }else{
            setFlash("Dihapus", "False", "Mahasiswa");
            echo '<script>window.location="dashboard/data_peserta.php";</script>';
        }
    }
    else if($_GET["aksi"] === "hapusMentor"){
        $id = $_GET["id"];
        $data_user = getData("SELECT * FROM user WHERE id = '$id'")[0];
        $nama_file = $data_user["foto"];
        if(file_exists("img/profie/$nama_file") && $nama_file != "user.jpg"){
            unlink("img/profile/$nama_file");
        }
        $cek = mysqli_query($conn, "DELETE FROM user WHERE id = '$id'");
        if($cek){
            setFlash("Dihapus", "True", "Mentor");
            echo '<script>window.location="dashboard/jadwal_admin.php";</script>';
        }else{
            setFlash("Dihapus", "False", "Mentor");
            echo '<script>window.location="dashboard/jadwal_admin.php";</script>';
        }
    }
    else if($_GET["aksi"] === "hapusJadwal"){
        $id = $_GET["id"];
        $cek = mysqli_query($conn, "DELETE FROM jadwal WHERE id = '$id'");
        if($cek){
            setFlash("Dihapus", "True", "Jadwal");
            echo '<script>window.location="dashboard/jadwal_admin.php";</script>';
        }else{
            setFlash("Dihapus", "False", "Jadwal");
            echo '<script>window.location="dashboard/jadwal_admin.php";</script>';
        }
    }
    else if($_GET["aksi"] === "hapusBidang"){
        $id = $_GET["id"];
        $cek = mysqli_query($conn, "DELETE FROM bidang_studi WHERE id = '$id'");
        if($cek){
            setFlash("Dihapus", "True", "Bidang_Studi");
            echo '<script>window.location="dashboard/daftar_bidang.php";</script>';
        }else{
            setFlash("Dihapus", "False", "Bidang_Studi");
            echo '<script>window.location="dashboard/daftar_bidang.php";</script>';
        }
    }
    else if($_GET["aksi"] === "publish"){
        $npm = $_GET["npm"];
        $cek = mysqli_query($conn, "UPDATE testimoni SET ket = '1' WHERE npm = '$npm'");
        if($cek){
            setFlash("Dipublish", "True", "Testimoni");
            echo '<script>window.location="dashboard/data_testimoni.php";</script>';
        }else{
            setFlash("Dipublish", "False", "Testimoni");
            echo '<script>window.location="dashboard/data_testimoni.php";</script>';
        }
    }
    else if($_GET["aksi"] === "tolak"){
        $npm = $_GET["npm"];
        $cek = mysqli_query($conn, "UPDATE testimoni SET ket = '2' WHERE npm = '$npm'");
        if($cek){
            setFlash("Ditolak", "True", "Testimoni");
            echo '<script>window.location="dashboard/data_testimoni.php";</script>';
        }else{
            setFlash("Ditolak", "False", "Testimoni");
            echo '<script>window.location="dashboard/data_testimoni.php";</script>';
        }
    }
}

?>