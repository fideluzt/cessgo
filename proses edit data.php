<?php
//koneksi database
require 'koneksi.php';
// menangkap data yang di kirim dari form
// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])) {
// ambil data dari tiap elemen dalam form
$id = $_POST["id"];    
$hari = htmlspecialchars($_POST["hari"]);
$ruang = htmlspecialchars($_POST["ruang"]);
$kelas = htmlspecialchars($_POST["kelas"]); 
$waktu = htmlspecialchars($_POST["waktu"]);
 // query update data
 
$query="UPDATE jadwal SET
 hari='$hari',ruang='$ruang',kelas='$kelas',waktu='$waktu'   where id='$id'";
mysqli_query($conn,$query);
// cek apakah data berhasil diedit atau tidak
if(mysqli_affected_rows($conn) > 0) {
 echo "<script language='javascript'>
 alert ('Jadwal berhasil diedeit'); 
 document.location='jadwal.php';
 </script>";
 }
 Else {
  echo "<script language='javascript'>
 alert ('Jadwal gagal diedit'); 
 </script>";
 echo mysqli_error($conn);
} }
?>