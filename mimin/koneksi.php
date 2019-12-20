<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "db_jogjabackpacker";

// Create connection
$koneksi = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

?>