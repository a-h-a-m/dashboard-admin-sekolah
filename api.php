<?php
    /*
    header("Content-Type: application/json");
    include("kon.php");

    $sql = "SELECT name,type,description,img_src FROM tes";
    $data = mysqli_query($koneksi, $sql);

    while ($row = mysqli_fetch_assoc($data)) {
        $hasil[] = $row;
    }

    echo json_encode($hasil);
    */

    // Menyediakan endpoint API
header("Content-Type: application/json");
include "koneksidb.php"; // File koneksi ke database

// Query untuk mengambil data
$sql = "SELECT name,type,description,img_src FROM tes";

// Mengeksekusi query
$result = mysqli_query($koneksi, $sql);

// Memeriksa apakah query berhasil dieksekusi
if ($result) {
    // Mengubah hasil query menjadi array asosiatif
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
    // Mengembalikan data dalam format JSON
    echo json_encode($data);
} else {
    echo json_encode(array("message" => "Tidak ada data ditemukan"));
}


?>