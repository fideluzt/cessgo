<?php 
// mengaktifkan session pada php
session_start();
// menghubungkan php dengan koneksi database
include 'koneksi.php';
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = md5($_POST['password']);
// menyeleksi data user dengan username dan password yang sesuai
$login = getData("SELECT * FROM user WHERE username = '$username'")[0];
// cek apakah username dan password di temukan pada database
if($login){
    if($password === $login["password"]){
        // buat session 
        $_SESSION['username'] = $username;
        $_SESSION['login']= $login["nama"];
        $_SESSION['nama']= $login["nama"];
        $_SESSION['level'] = $login["level"];
        // cek jika user login sebagai admin
        if($login['level'] == "admin"){
            // alihkan ke halaman dashboard admin
            header("Location: dashboard/admin.php");
        }
        // cek jika user login sebagai operator
        else if($login['level']=="mentor"){
            // alihkan ke halaman dashboard operator
            header("Location: dashboard/profil.php");
            // cek jika user login sebagai direktur
        }else if($login['level']=="mahasiswa"){
            // alihkan ke halaman dashboard direktur
            header("Location: dashboard/profil.php");
        }else{
        // alihkan ke halaman login kembali
        header("location:login.php");
        }

    }else {
        setFlashSistem("Salah", "danger", "Password Anda");
       header("Location: login.php");
    }
}else{
     setFlashSistem("Salah/Belum Terdaftar", "danger", "Username Anda");
    header("Location: login.php");
}
?>
