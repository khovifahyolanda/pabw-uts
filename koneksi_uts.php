<?php
function koneksiUts(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "uts";

    // menciptakan koneksi
    $koneksi = mysqli_connect($servername, $username, $password,$dbname);

    // Cek koneksi
    if (!$koneksi) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    return $koneksi;
}