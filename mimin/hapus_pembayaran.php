<?php
include 'koneksi.php';
$id_pemesanan = $_GET['id_pemesanan'];
$sql = "DELETE FROM pemesanan WHERE id_pemesanan = '$id_pemesanan' ";
$sql2 = "DELETE FROM pembayaran WHERE id_pemesanan = '$id_pemesanan' ";

if (mysqli_query($koneksi, $sql2)) {
    if(mysqli_query($koneksi, $sql)){
        echo "<script>window.alert('DATA DIHAPUS DARI DB');window.location.href='pembayaran.php';</script>";
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);      
    }
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
}

?>