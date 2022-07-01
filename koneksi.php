<?php
if(!session_id()) session_start();
$conn = mysqli_connect("localhost","root","","cessgo");
// Check connection
if (mysqli_connect_errno()){
echo "Koneksi database gagal : " . mysqli_connect_error();
}

function getData($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];

    while($data = mysqli_fetch_assoc($result)) {
        $rows[] = $data;
    }

    return $rows;

}

// Function uploadGambar
function uploadGambar($path){
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFIle = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    if($error === 4){
        echo "<script>
            alert('File Belum Di Upload!!');
        </script>";
        return false;
    }

    $ekstensiValid = ["jpeg", "jpg", "png"];
    // foto1.jpg => ["foto1", "jpg"]
    $ekstensiFile = explode(".", $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile)); // jpg

    if(!in_array($ekstensiFile, $ekstensiValid)){
        echo "<script>
            alert('Ekstensi File tidak valid');
        </script>";
        return false;
    }

    if($ukuranFIle > 1000000){
        echo "<script>
            alert('Ukuran File Terlalu Besar');
        </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFile;

    move_uploaded_file($tmpName, $path . $namaFileBaru );

    return $namaFileBaru;

}

function changePassword($data){
        global $conn;
        $username = htmlspecialchars($data["username"]);
        $recent_pass = mysqli_escape_string($conn, $data["recent_password"]);
        $pass1 = mysqli_escape_string($conn, $data["password1"]);
        $pass2 = mysqli_escape_string($conn, $data["password2"]);

        $data = getData("SELECT password FROM `user` WHERE username = '$username'")[0];
        if(md5($recent_pass === $data["password"])){
            if($pass1 === $pass2){
                $password = md5($pass1);
                mysqli_query($conn, "UPDATE `user` SET password =  '$password' WHERE username = '$username'");
                return mysqli_affected_rows($conn);
            }else{
                infoFlash("Konfirmasi password tidak sesuai!");
                //  echo '<script type="text/javascript">
                //     alert("Konfirmasi password tidak sesuai!");
                //     </script>'; 
                    return false;
            }
        }else {
            infoFlash("Password lama salah!");
            //  echo '<scrip type="text/javascript">
            //         alert("Password Lama Salah!");
            //         </script>'; 
                    return false;
                    
            }
    }

    function updateProfil($data){
        global $conn;
        $nim = $data["nim"];
        $nama = $data["nama"];
        $email = $data["email"];
        $fotoLama = $data["gambar_lama"];
        if($_FILES["gambar"]["error"] === 4){
            $foto = $fotoLama;
        }else{
            if($fotoLama !== "user.jpg"){
                if(file_exists("../img/profile/$fotoLama")){
                    unlink("../img/profile/$fotoLama");
                }
            }
            $foto = uploadGambar("../img/profile/");
        }

        mysqli_query($conn, "UPDATE user SET nama = '$nama', email = '$email', foto = '$foto' WHERE username = '$nim'");
        return mysqli_affected_rows($conn);

    }


 // Fungsi untuk set session yang akan digunakan sweetalert jangan dihapus ya
    function setFlash($aksi, $response, $data){
    $_SESSION["flash"] = [
        "aksi" => $aksi,
        "response" => $response,
        "data" => $data
    ];
}
    function infoFlash($info){
        $_SESSION["info"] = $info;
    }
    
    function info(){
        if(isset($_SESSION["info"])){
            echo '<div id="data-info" data-info="'. $_SESSION["info"] .'"></div>';
           unset($_SESSION["info"]); 
        }
    }
    function flash(){
    if(isset($_SESSION["flash"])){
        // $data = 
        echo '<div id="data-flash" data-flash="'. $_SESSION["flash"]["aksi"].' '.$_SESSION["flash"]["response"] .' '.$_SESSION["flash"]["data"].'"></div>';
        unset($_SESSION["flash"]);
    }
}

    function setFlashSistem($pesan, $alert, $data){
        $_SESSION["message"] = [
            "pesan" => $pesan,
            "alert" => $alert,
            "data" => $data
        ];
    }
    function flashSistem(){
    if(isset($_SESSION["message"])){
        // $data = 
        echo '<div class="alert alert-'. $_SESSION["message"]["alert"] .' alert-dismissible fade show" role="alert">
            <strong>'. $_SESSION["message"]["data"] .'!</strong> '. $_SESSION["message"]["pesan"] .'.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>';
        unset($_SESSION["message"]);
    }
    }


// Proses Halaman Jadwal Admin
// Tambah Mentor 
    function tambahMentor($data){
        global $conn;
        $npm_mentor = $data["npm_mentor"];
        $nama_mentor = $data["nama_mentor"];
        $kelas = $data["kelas"];
        $email_mentor = $data["email_mentor"];
        $password = random_int(100000, 1000000);
        $pesan = "Hallo $nama_mentor saat ini kamu terdaftar sebagai mentor CESSGO Teknik Komputer 2020 silahkan login menggunakan <br> <b>Username : $npm_mentor</b> <br> <b>Password : $password</b> <br><br><br> !Kami sarankan agar anda segera mengganti passwordnya";
        $resp = notifikasi($nama_mentor, $email_mentor, "Mentor Password - CESSGO", $pesan );
        $resp = json_decode($resp, true);
        if($resp["statusCode"] == 200){
            echo "<script>
                console.log('Email Berhasil Dikirim!');
            </script>";
        }else{
            return false;
        }
        $password = md5($password);
        mysqli_query($conn, "INSERT INTO user VALUES('', '$npm_mentor', '$nama_mentor', '$email_mentor', '$password', '$kelas', 'mentor', 'user.jpg')");
        return mysqli_affected_rows($conn);
    }

    // Tambah Jadwal 
        function tambahJadwal($data){
            global $conn;
            $hari = $data["hari"];
            $ruang = $data["ruang"];
            $kelas = $data["kelas"];
            $jam = $data["jam"];
            $mentor = $data["mentor"];
            mysqli_query($conn, "INSERT INTO jadwal VALUES('', '$hari', '$ruang', '$kelas', '$jam', '$mentor')");
            return mysqli_affected_rows($conn);
        }
    // Update Jadwal 
        function updateJadwal($data){
            global $conn;
            $id_jadwal = $data["id_jadwal"];
            $hari = $data["hari"];
            $ruang = $data["ruang"];
            $kelas = $data["kelas"];
            $jam = $data["jam"];
            $mentor = $data["mentor"];
            mysqli_query($conn, "UPDATE jadwal SET hari = '$hari', ruang = '$ruang', kelas = '$kelas', waktu = '$jam', mentor = '$mentor' WHERE id = '$id_jadwal'");
            return mysqli_affected_rows($conn);
        }
    
    // Proses Halaman Daftar Bidang
    // Tambah Bidang Studi 
        function tambahBidangStudi($data){
            global $conn;
            $nama_bidang = $data["nama_bidang"];
            $deskripsi_bidang = $data["deskripsi_bidang"];
            $kuota = $data["kuota"];
            $mentor = $data["mentor"];
            $foto = uploadGambar("../img/bidang_studi/");
            $video = $data["video"];
            mysqli_query($conn, "INSERT INTO bidang_studi VALUES('', '$nama_bidang', '$deskripsi_bidang', '$kuota', '$mentor', '$foto', '$video')");
            return mysqli_affected_rows($conn);
        }
        // Update Bidang Studi
        function updateBidangStudi($data){
            global $conn;
            $id = $data["id"];
            $nama_bidang = $data["nama_bidang"];
            $deskripsi_bidang = $data["deskripsi_bidang"];
            $kuota = $data["kuota"];
            $mentor = $data["mentor"];
            $video = $data["video"];
            $fotoLama = $data["gambar_lama"];
            if($_FILES["gambar"]["error"] === 4){
                $foto = $fotoLama;
            }else{
                if(file_exists("../img/bidang_studi/$fotoLama")){
                    unlink("../img/bidang_studi/$fotoLama");
                 }
                $foto = uploadGambar("../img/bidang_studi/");
            }
            mysqli_query($conn, "UPDATE bidang_studi SET nama_bidang = '$nama_bidang', deskripsi = '$deskripsi_bidang', kuota = '$kuota', mentor = '$mentor', foto = '$foto', video = '$video' WHERE id = '$id'");
            return mysqli_affected_rows($conn);
        }

         // Kirim Testimoni 
        function kirimTestimoni($data){
            global $conn;
            $testimoni = $data["testimoni"];
            $nama = $data["nama"];
            $npm = $data["npm"];
            $title = $data["title"];
            $foto = uploadGambar("../img/testimoni/");
            mysqli_query($conn, "INSERT INTO testimoni VALUES('$npm', '$nama', '$title', '$testimoni', '$foto', '3')");
            return mysqli_affected_rows($conn);
        }
    
// API Kirim email

    function notifikasi($namaPenerima, $emailPenerima, $subject, $pesan){
    $url = "https://fimail.vercel.app/send";
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
    "Content-Type: application/json",
    );
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $data = <<<DATA
    {
        "from": {
            "name": "Admin CESSGO",
            "address": "anissa.fidelia@gmail.com"
        },
        "to": {
            "name": "$namaPenerima",
            "address": "$emailPenerima"
        },
        "subject": "$subject",
        "contents": "$pesan"
    }
DATA;

    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

    //for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);
    return $resp;
}


?>