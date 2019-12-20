<?php
include 'koneksi.php';
$id_pemesanan = $_GET['id_pemesanan'];
$sql = "UPDATE pemesanan SET status ='sudah' WHERE id_pemesanan = '$id_pemesanan' ";

if (mysqli_query($koneksi, $sql)) {
  echo "<script>window.alert('Pemesanan Sukses Dikonfirmasi');window.location.href='pesanan.php';</script>";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

?>