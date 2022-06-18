
<?php
    // if(isset($_GET['kembali'])){
    require 'koneksi.php';
$id = $_GET['id'];
// Ambil data dari tblmhs
$result = mysqli_query($conn, "SELECT * FROM user where id=$id");
$data = mysqli_fetch_assoc($result);
?>
<html>
<head>
    <title>Script PHP untuk Menampilkan Data dari Database berdasarkan Id</title>
</head>
<body>
 <h2>Detail Data Mahasiswa</h2>
    
    <table border="0" cellpadding="4">
        
            
        <tr>
            <td size="90">username</td>
            <td>: <?php echo $data['username']?></td>
        </tr>
        <tr>
            <td>Nama</td>
            <td>: <?php echo $data['nama']?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td>: <?php echo $data['email']?>
        </tr>

        <tr>
            <td>Kelas</td>
            <td>: <?php echo $data['kelas']?></td>
        </tr>
        <tr>
            <td>Tanggal Tagihan</td>
            <td>: <?php echo $data['tanggal_tagihan']?></td>
        </tr>
        <tr>
            <td>Total</td>
            <td>: <?php echo $data['total']?></td>
        </tr>
       

        <tr height="40">
            <td></td>
            <td>   <a href="data_pembayaran_admin.php">Kembali</a></td>
        </tr>
    </table>
</body>
</html>
