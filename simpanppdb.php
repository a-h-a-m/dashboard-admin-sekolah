<?php
    include("koneksidb.php");

    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $no_hp = $_POST['no_hp'];
    $nilai = $_POST['nilai'];
    $jarak_rumah = $_POST['jarak_rumah'];
    $status = "Daftar";
    $keterangan = "PPDB";
    $tanggal_daftar = date("Y-m-d h:i:s");

    $sql="INSERT INTO siswa(nama_siswa,tempat_lahir,tanggal_lahir,asal_sekolah,nilai,jarak,no_hp,status,tanggal_daftar,keterangan) VALUE('$nama','$tempat_lahir','$tgl_lahir','$asal_sekolah','$nilai','$jarak_rumah','$no_hp','$status','$tanggal_daftar','$keterangan')";

    $data=mysqli_query($koneksi,$sql);
    if($data)
    {
        echo "Data PPDB berhasil disimpan";
    }else
    {
        echo "Data PPDB gagal disimpan";
    }

?>