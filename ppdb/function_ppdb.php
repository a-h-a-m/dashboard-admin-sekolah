<?php
include '../koneksidb.php';

if($_GET['act']== 'diterimappdb'){
    $id_siswa = $_GET['id'];
    $status = "Aktif";
    $id_kelas = "K0001";
    require_once("../genid.php");
        $nis=kode_auto("siswa","nis","",1,4);

    //query
    $querytambah =  mysqli_query($koneksi, "UPDATE siswa SET status='$status',id_kelas='$id_kelas',nis='$nis' WHERE id_siswa='$id_siswa'");

    $querynilai = mysqli_query($koneksi, "INSERT INTO nilai(nis) VALUE('$nis')");


    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../ppdb/data_ppdb.php");
    }
    else{
        echo "ERROR, tidak berhasil". mysqli_error($koneksi);
    }
}
elseif($_GET['act']=='updateppdb'){
    $id_siswa = $_POST['id_siswa'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $nilai = $_POST['nilai'];
    $jarak = $_POST['jarak'];
    $no_hp = $_POST['no_hp'];
    

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE siswa SET nama_siswa='$nama',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',asal_sekolah='$asal_sekolah',nilai='$nilai',jarak='$jarak',no_hp='$no_hp' WHERE id_siswa='$id_siswa' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../ppdb/data_ppdb.php");    
    }
    else{
        echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
    }
}
elseif ($_GET['act'] == 'deleteppdb'){
    $id_siswa = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa = '$id_siswa'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../ppdb/data_ppdb.php");
    }
    else{
        echo "ERROR, data gagal dihapus". mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>