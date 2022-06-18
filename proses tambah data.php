<?php
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

 
 // query insert data
$query="INSERT INTO user VALUES
('', '$username', '$nama', '$email','$password', '$kelas', 'mahasiswa')";
mysqli_query($conn, $query);
// cek apakah data berhasil ditambahkan atau tidak
if(mysqli_affected_rows($conn) > 0) {
 echo "<script language='javascript'>
 alert ('Selamat! Anda berhasil mendaftar'); 
 document.location='login.php';
 </script>";
 }
 else
 {
 echo "<script language='javascript'>
 alert ('Data mahasiswa gagal ditambahkan'); 
 </script>";
 echo mysqli_error($conn);
 }
}
?>
