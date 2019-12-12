<?php
include 'koneksi.php';
$sql = "DELETE FROM paket WHERE id_paket='$_GET[id_paket]' ";

if (mysqli_query($koneksi, $sql)) {
    echo "<script>
    window.alert('Data berhasil dihapus');
    window.location.href='paket.php';
    </script>";
} else {
    echo "Error deleting record: " . mysqli_error($koneksi);
}

?>