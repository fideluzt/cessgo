<?php
session_start();
//koneksi database
require 'koneksi.php';
// menangkap data yang di kirim dari form
// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])) {
$username = htmlspecialchars($_POST["username"]);
$nama = htmlspecialchars($_POST["nama"]);
$email = htmlspecialchars($_POST["email"]);
$password = md5($_POST["password"]);

$kelas = htmlspecialchars($_POST["kelas"]);  

$data_user = getData("SELECT username FROM user WHERE username = '$username'");
if($data_user){
    setFlashSistem("Sudah Terdaftar", "danger", "Your Account");
    header("Location: daftar.php");
    return false;
}
if($_POST["password"] !== $_POST["konfirmasi_password"]){
    setFlashSistem("Tidak Sesuai", "danger", "Konfirmasi Password");
    header("Location: daftar.php");
    return false;
}
// query insert data
$query="INSERT INTO user VALUES
   ('', '$username', '$nama', '$email','$password', '$kelas', 'mahasiswa')";
  $hasil = mysqli_query($conn, $query);

   // cek apakah data berhasil ditambahkan atau tidak
   if($hasil) {
       setFlashSistem("Silahkan Login", "success", "Berhasil Mendaftar");
       echo "<script language='javascript'>
       document.location='login.php';
       </script>";
    }
    else
    {
        setFlashSistem("Terjadi kesalahan, silahkan coba lagi", "danger", "Gagal Mendaftar");
    echo "<script language='javascript'>
    document.location.href = 'daftar.php';
    </script>";
    }
}

?>
