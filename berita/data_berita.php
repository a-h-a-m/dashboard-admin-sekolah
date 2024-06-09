<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>

<?php 
include '../template/header_admin.php'; 
include '../koneksidb.php';
?>

<body>


<div class="content-wrapper">
<section class="content-header">
  <h1>Data Berita
  </h1>
  <ol class="breadcrumb">
  <li><a href="../admin/admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Data Berita</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Data Berita</h3> 
          <div class="box-tools pull-left">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahberita"><i class="fa fa-male"></i> Tambah Berita</a>
          </div>
        </div>
        <div class="box-body">

          <div class="table-responsive22">
            <table id="datatable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Id Berita</th>
                  <th>Foto</th>
                  <th>Judul</th>
                  <th>Isi</th>
                  <th>Kategori</th>
                  <th>Tanggal</th>
                  <th>Dibaca</th>
                  
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    $no = 1;
                    $queryview = mysqli_query($koneksi, "SELECT * FROM kategori a,berita b WHERE a.id_kategori=b.id_kategori");
                    while ($row = mysqli_fetch_assoc($queryview)) {
                  ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $row['id_berita'];?></td>
                    <td><img src="../foto/<?php echo $row['id_berita']; ?>.jpg" width="100px"></td>
                    <td><?php echo $row['judul'];?></td>
                    <td><?php echo $row['isi'];?></td>
                    <td><?php echo $row['kategori'];?></td>
                    <td><?php echo $row['tanggal'];?></td>
                    <td><?php echo $row['dibaca'];?></td>
                    
                    <td>
                      <!--<a href="../user/form_edituser.php?id=<?php echo $row['id_user']?>" class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil"></i> Edit</a>-->
                      <a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#updatekelas<?php echo $no; ?>"><i class="fa fa-pencil"></i> Edit</a>
                      <a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#deletekelas<?php echo $no; ?>"><i class="fa fa-trash"></i> Delete</a>
                                            
                      
                      <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deletekelas<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Konfirmasi Delete Data Berita</h3>
                              </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin menghapus Berita <?php echo $row['id_berita'];?><strong><span class="grt"></span></strong> ?</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                <a href="../berita/function_berita.php?act=deletekelas&id=<?php echo $row['id_berita']; ?>" class="btn btn-primary">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->

                      <!-- modal update user -->
                      <div class="example-modal">
                        <div id="updatekelas<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Edit Data Kelas</h3>
                              </div>
                              <div class="modal-body">
                                <form action="../kelas/function_kelas.php?act=updatekelas" method="post" role="form">
                                  <?php
                                  $id_kelas = $row['id_kelas'];
                                  $query = "SELECT * FROM kelas a,guru b WHERE a.id_guru=b.id_guru and a.id_kelas='$id_kelas'";
                                  $result = mysqli_query($koneksi, $query);
                                  while ($row = mysqli_fetch_assoc($result)) {
                                  ?>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Id Kelas <span class="text-red">*</span></label>         
                                      <div class="col-sm-8"><input type="text" class="form-control" name="id_kelas" placeholder="Id Kelas" value="<?php echo $row['id_kelas']; ?>" readonly></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Kelas <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="kelas" placeholder="Kelas" value="<?php echo $row['kelas']; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Wali Kelas <span class="text-red">*</span></label>         
                      <div class="col-sm-8">
                        <select name="id_guru" class="form-control">
                          <option value="<?php echo $row['id_guru']; ?>"><?php echo $row['nama_guru']; ?></option>
                          <?php
                            include("../koneksidb.php");
                            $sql="select * from guru a,mapel b where a.id_mapel=b.id_mapel and b.mapel='Wali Kelas'";
                            $data=mysqli_query($koneksi,$sql);
                            if(mysqli_num_rows($data)>0)
                            {
                              while($hasil=mysqli_fetch_array($data))
                              {
                                echo "<option value='$hasil[id_guru]'>$hasil[nama_guru]</option>";
                              }
                            }
                          ?>
                        </select>
</div>
                      </div>
                    </div>
                                  <div class="modal-footer">
                                    <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                    <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                  </div>
                                  <?php
                                  }
                                  ?>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal update user -->
                    </td>
                  </tr>
                  <?php
                    }
                  ?>
              </tbody>
            </table>
          </div> 
        </div>

        <!-- modal insert -->
        <div class="example-modal">
          <div id="tambahberita" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog"> 
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Tambah Berita Baru</h3>
                </div>
                <div class="modal-body">
                  
                  <form action="../berita/function_berita.php?act=tambahberita" method="post" role="form" enctype="multipart/form-data">
                  <?php
                  require_once("../genid.php");
                  $kode=kode_auto("berita","id_berita","B",1,4);
                ?>  
                  <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Id Berita <span class="text-red">*</span></label>         
                      <div class="col-sm-8"><input type="text" class="form-control" name="id_berita" value="<?php echo $kode; ?>" readonly></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Judul <span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="text" class="form-control" name="judul" value=""></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Isi <span class="text-red">*</span></label>         
                      <div class="col-sm-8">
                      <textarea id="Isi" name="isi" value=""></textarea>
</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Kategori <span class="text-red">*</span></label>         
                      <div class="col-sm-8">
                        <select class="form-control" name="id_kategori">
                          <?php
                            include("../koneksidb.php");
                            $sql="select * from kategori";
                            $data=mysqli_query($koneksi,$sql);
                            if(mysqli_num_rows($data)>0)
                            {
                              while($hasil=mysqli_fetch_array($data))
                              {
                                echo "<option value='$hasil[id_kategori]'>$hasil[kategori]</option>";
                              }
                            }
                          ?>
                        </select>
                      </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Foto <span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="file" class="form-control" name="foto" value=""></div>
                      </div>
                    </div>
                    
                    
                    <div class="modal-footer">
                      <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                      <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    </div>
                    <!--<div class="box-footer">
                      <a href="../user/data_user.php" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
                      <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    </div> /.box-footer -->
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div><!-- modal insert close -->
      </div>
    </div>
  </div>
</section><!-- /.content -->
</div>



<?php include '../template/footer.php'; ?>

</body>
</html>