<?php
include '../koneksidb.php';

if($_GET['act']== 'tambahberita'){
    $id_berita = $_POST['id_berita'];
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $kategori = $_POST['id_kategori'];
    $tanggal = date("Y-m-d h:i:s");
    $folder = "../foto/";
    $namafile = $id_berita.".jpg";
    $tujuan = $folder.$namafile;
    $dibaca = 0;
    $tmp = $_FILES['foto']['tmp_name'];

    //query
    if(move_uploaded_file($tmp,$tujuan))
    {
    $query = "INSERT INTO berita(id_berita, judul, isi, id_kategori, tanggal, dibaca) VALUE('$id_berita' , '$judul', '$isi', '$kategori', '$tanggal', '$dibaca')";
    $querytambah =  mysqli_query($koneksi, $query);

    if ($querytambah) {
        # code redicet setelah insert ke index
        header("location:../berita/data_berita.php");
    }
    else{
        echo "ERROR, tidak berhasil". mysqli_error($koneksi);
    }
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
    $querydelete = mysqli_query($koneksi, "DELETE FROM berita WHERE id_berita = '$id_kelas'");

    if ($querydelete) {
        # redirect ke index.php
        header("location:../berita/data_berita.php");
    }
    else{
        echo "ERROR, data gagal dihapus". mysqli_error($koneksi);
    }

    mysqli_close($koneksi);
}
?>