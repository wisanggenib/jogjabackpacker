<?php
include '../mimin/koneksi.php';

//select data from register form
$username = $_POST['username'];
$pass = md5($_POST['pass']);

$sql = "SELECT * FROM member WHERE username = '$username' AND password ='$pass' ";
$result = $koneksi->query($sql);
$row = $result->fetch_assoc();

if(empty($row['id_member'])){
    echo "<script> alert('username atau password salah'); window.location = 'index.php';</script>";
}else{
    session_start();
    $_SESSION['username'] = $row['username'];
    $_SESSION['id_member'] = $row['id_member'];
    echo "<script> alert('login berhasil'); window.location = '../';</script>";
}
?>