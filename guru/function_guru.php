<?php
include '../koneksidb.php';

if($_GET['act']== 'tambahguru'){
    $id_guru = $_POST['id_guru'];
    $nama_guru = $_POST['nama_guru'];
    $id_mapel = $_POST['id_mapel'];
    $no_hp = $_POST['no_hp'];


    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO guru VALUES('$id_guru' , '$nama_guru','$id_mapel','$no_hp')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../guru/data_guru.php");
    }
    else{
        echo "ERROR, tidak berhasil". mysqli_error($koneksi);
    }
}
elseif($_GET['act']=='updateguru'){
    $id_guru = $_POST['id_guru'];
    $guru = $_POST['guru'];
    $id_mapel = $_POST['id_mapel'];
    $no_hp = $_POST['no_hp'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE guru SET nama_guru='$nama_guru' WHERE id_guru='$id_guru' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../guru/data_guru.php");    
    }
    else{
        echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
    }
}
elseif ($_GET['act'] == 'deleteguru'){
    $id_guru = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM guru WHERE id_guru = '$id_guru'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../guru/data_guru.php");
    }
    else{
        echo "ERROR, data gagal dihapus". mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>