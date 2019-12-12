<?php
include 'koneksi.php';

$sql = "UPDATE paket SET nama='$_POST[nama]',detail='$_POST[detail]',harga='$_POST[harga]',rating='$_POST[rating]',etc='$_POST[etc]' WHERE id_paket='$_POST[id_paket]' ";

if (mysqli_query($koneksi, $sql)) {
    echo "<script>
    window.alert('Data berhasil dirubah');
    window.location.href='paket.php';
    </script>";
} else {
    echo "Error updating record: " . mysqli_error($koneksi);
                    }                     

?>