<?php
include '../koneksidb.php';

if($_GET['act']== 'tambahnilai'){
    $id_mapel = $_POST['id_mapel'];
    $nis = $_POST['nis'];
    $tugas1 = $_POST['tgs1'];
    $tugas2 = $_POST['tgs2'];
    $tugas3 = $_POST['tgs3'];
    

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO nilai(nis,id_mapel,tugas1,tugas2,tugas3) VALUE('$nis','$id_mapel' , '$tugas1' , '$tugas2' , '$tugas3')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../nilai_tugas/data_tugas.php");
    }
    else{
        echo "ERROR, tidak berhasil". mysqli_error($koneksi);
    }
}
elseif($_GET['act']=='updatenilai'){
    $id = $_POST['id_nilai'];
    $tugas1 = $_POST['tgs1'];
    $tugas2 = $_POST['tgs2'];
    $tugas3 = $_POST['tgs3'];
    

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE nilai SET tugas1='$tugas1',tugas2='$tugas2',tugas3='$tugas3' WHERE id_nilai='$id' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../nilai_tugas/data_tugas.php");    
    }
    else{
        echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
    }
}
elseif ($_GET['act'] == 'deletemapel'){
    $id_mapel = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM mapel WHERE id_mapel = '$id_mapel'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../mapel/data_mapel.php");
    }
    else{
        echo "ERROR, data gagal dihapus". mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>