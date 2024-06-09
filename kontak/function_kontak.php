<?php
include '../koneksidb.php';

if($_GET['act']== 'tambahkategori'){
    $id_kategori = $_POST['id_kategori'];
    $kategori = $_POST['kategori'];
    
    //query
    $querytambah =  mysqli_query($koneksi, "INSERT INTO kategori VALUES('$id_kategori' , '$kategori')");

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../kategori/data_kategori.php");
    }
    else{
        echo "ERROR, tidak berhasil". mysqli_error($koneksi);
    }
}
elseif($_GET['act']=='updatekelas'){
    $id_kelas = $_POST['id_kelas'];
    $kelas = $_POST['kelas'];

    //query update
    $queryupdate = mysqli_query($koneksi, "UPDATE kelas SET kelas='$kelas' WHERE id_kelas='$id_kelas' ");

    if ($queryupdate) {
        # credirect ke page index
        header("location:../kelas/data_kelas.php");    
    }
    else{
        echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
    }
}
elseif ($_GET['act'] == 'deletekelas'){
    $id_kelas = $_GET['id'];

    //query hapus
    $querydelete = mysqli_query($koneksi, "DELETE FROM kelas WHERE id_kelas = '$id_kelas'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../kelas/data_kelas.php");
    }
    else{
        echo "ERROR, data gagal dihapus". mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>