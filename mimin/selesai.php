<?php
include 'koneksi.php';
$id_pemesanan = $_GET['id_pemesanan'];
$sql = "UPDATE pemesanan SET status ='tidak_aktif' WHERE id_pemesanan = '$id_pemesanan' ";

if (mysqli_query($koneksi, $sql)) {
  echo "<script>window.alert('PEMESANAN DIANGGAP SUDAH TIDAK BERJALAN !!!');window.location.href='pembayaran.php';</script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

?>