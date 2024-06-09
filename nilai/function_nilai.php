<?php
include '../koneksidb.php';

if($_GET['act']== 'tambahmapel'){
    $id_mapel = $_POST['id_mapel'];
    $mapel = $_POST['mapel'];

    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO mapel VALUES('$id_mapel' , '$mapel')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../mapel/data_mapel.php");
    }
    else{
        echo "ERROR, tidak berhasil". mysqli_error($koneksi);
    }
}
elseif($_GET['act']=='updatemapel'){
    $id_mapel = $_POST['id_mapel'];
    $mapel = $_POST['mapel'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE mapel SET mapel='$mapel' WHERE id_mapel='$id_mapel' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../mapel/data_mapel.php");    
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