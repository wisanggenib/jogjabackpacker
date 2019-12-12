<?php
include '../mimin/koneksi.php';

//select data from register form
$name = $_POST['name'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$username = $_POST['username'];
$pass = md5($_POST['pass']);

$sql = "SELECT * FROM member WHERE username = '$username' ";
$result = $koneksi->query($sql);
$row = $result->fetch_assoc();

if(empty($row['username'])){
        $sql = "INSERT INTO member (nama_member, alamat, email, username,password)
                VALUES ('$name', '$alamat', '$email','$username','$pass')";

        if ($koneksi->query($sql) === TRUE) {
            echo "<script> alert('Pendaftaran berhasil'); window.location = 'index.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
            echo "<script> alert('Pendaftaran gagal'); window.location = 'register.php';</script>";
        }
}else{
    echo "<script> alert('username sudah terdaftar, silahkan gunakan username lain'); window.location = 'register.php';</script>";
}
?>