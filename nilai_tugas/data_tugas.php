<?php 
include '../template/header_admin.php'; 
include '../koneksidb.php';
$kelas = $_GET['kl'];
$mapel = $_GET['mpl'];
?>

<div class="content-wrapper">
<section class="content-header">
  <h1>Data Nilai Tugas
  </h1>
  <ol class="breadcrumb">
  <li><a href="../admin/admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Data Nilai Tugas</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Data Nilai Tugas</h3> 
          <div class="box-tools pull-left">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahmapel"><i class="fa fa-male"></i> Tambah Nilai Tugas</a>
          </div>
        </div>
        <div class="box-body">

          <div class="table-responsive22">
            <table id="datatable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>NIS</th>
                  <th>Nama</th>
                  
                  <th>Tugas 1</th>
                  <th>Tugas 2</th>
                  <th>Tugas 3</th>
                  
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    $no = 1;
                    $queryview = mysqli_query($koneksi, "SELECT * FROM siswa a,nilai b WHERE a.nis=b.nis and a.id_kelas='$kelas'");
                    if(mysqli_num_rows($queryview)>0)
                    {
                    while ($row = mysqli_fetch_assoc($queryview)) {
                  ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $row['nis'];?></td>
                    <td><?php echo $row['nama_siswa'];?></td>
                    
                  <td><?php echo $row['tugas1'];?></td>
                  <td><?php echo $row['tugas2'];?></td>
                  <td><?php echo $row['tugas3'];?></td>
                  
                  
                    <td>
                      <!--<a href="../user/form_edituser.php?id=<?php echo $row['id_user']?>" class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil"></i> Edit</a>-->
                      <a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#updatenilai<?php echo $no; ?>"><i class="fa fa-pencil"></i> Edit</a>
                      <a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#deletemapel<?php echo $no; ?>"><i class="fa fa-trash"></i> Delete</a>                      
                      
                      <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deletemapel<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Konfirmasi Delete Data Mapel</h3>
                              </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin menghapus <?php echo $row['mapel'];?><strong><span class="grt"></span></strong> ?</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                <a href="../mapel/function_mapel.php?act=deletemapel&id=<?php echo $row['id_mapel']; ?>" class="btn btn-primary">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->

                      <!-- modal update user -->
                      <div class="example-modal">
                        <div id="updatenilai<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Edit Data Nilai Tugas</h3>
                              </div>
                              <div class="modal-body">
                                <form action="../nilai_tugas/function_tugas.php?act=updatenilai" method="post" role="form">
                                  <?php
                                  $nis = $row['nis'];
                                  $query = "SELECT * FROM nilai WHERE id_mapel='$mapel' and nis='$nis'";
                                  $result = mysqli_query($koneksi, $query);
                                  while ($row = mysqli_fetch_assoc($result)) {
                                  ?>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Id Nilai <span class="text-red">*</span></label>         
                                      <div class="col-sm-8"><input type="text" class="form-control" name="id_nilai" value="<?php echo $row['id_nilai']; ?>" readonly></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nilai Tugas 1 <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="tgs1" value="<?php echo $row['tugas1']; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nilai Tugas 2 <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="tgs2" value="<?php echo $row['tugas2']; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nilai Tugas 3 <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="tgs3" value="<?php echo $row['tugas3']; ?>"></div>
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
                  }
                  
                  ?>
              </tbody>
            </table>
          </div> 
        </div>

        <!-- modal insert -->
        <div class="example-modal">
          <div id="tambahmapel" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog"> 
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Input Nilai Tugas Baru</h3>
                </div>
                <div class="modal-body">
                  <form action="../nilai_tugas/function_tugas.php?act=tambahnilai" method="post" role="form">
                  <?php
                  $mapel = $_GET['mpl'];
                ?>  
                  <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Id Mapel <span class="text-red">*</span></label>         
                      <div class="col-sm-8"><input type="text" class="form-control" name="id_mapel" placeholder="Id Mapel" value="<?php echo $mapel; ?>" readonly></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Siswa <span class="text-red">*</span></label>
                      <div class="col-sm-8">
                      <select name="nis" class="form-control">
                      <?php
                        $kelas = $_GET['kl'];
                        $sql = "select * from siswa where id_kelas='$kelas'";
                        $data = mysqli_query($koneksi,$sql);
                        if(mysqli_num_rows($data)>0)
                        {
                          while($hasil=mysqli_fetch_array($data))
                          {
                            echo "<option value='$hasil[nis]'>$hasil[nama_siswa]</option>";
                          }
                        }
                      ?>
                      </select>
                      </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Nilai Tugas 1 <span class="text-red">*</span></label>         
                      <div class="col-sm-8"><input type="text" class="form-control" name="tgs1" value=""></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Nilai Tugas 2 <span class="text-red">*</span></label>         
                      <div class="col-sm-8"><input type="text" class="form-control" name="tgs2" value=""></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Nilai Tugas 3 <span class="text-red">*</span></label>         
                      <div class="col-sm-8"><input type="text" class="form-control" name="tgs3" value=""></div>
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