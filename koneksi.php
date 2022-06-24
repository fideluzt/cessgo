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
            //  echo '<script type="text/javascript">
            //         alert("Password Lama Salah!");
            //         </script>'; 
                    return false;
                    
            }
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

// API Kirim email
function kirimEmail($namaPenerima, $emailPenerima, $pesan){
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
        "name": "$namaPenerima",
        "address": "$emailPenerima"
    },
    "to": {
        "name": "Admin Cessgo",
        "address": "irpansyah810@gmail.com"
    },
    "subject": "Pesan Kontak - WEB CESSGO",
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