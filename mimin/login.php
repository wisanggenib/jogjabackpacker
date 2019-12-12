<?php
include 'koneksi.php';

//select data from register form
$username = $_POST['username'];
$pass = md5($_POST['pass']);

$sql = "SELECT * FROM admin WHERE username = '$username' AND password ='$pass' ";
$result = $koneksi->query($sql);
$row = $result->fetch_assoc();

if(empty($row['id_admin'])){
    echo "<script> alert('username atau password salah'); window.location = 'login-register.html';</script>";
}else{
    session_start();
    $_SESSION['id_admin'] = $row['id_admin'];
    echo "<script> alert('login berhasil'); window.location = 'index.php';</script>";
}
?>