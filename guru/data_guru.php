<?php 
include '../template/header_admin.php'; 
include '../koneksidb.php';
?>

<div class="content-wrapper">
<section class="content-header">
  <h1>Data Guru
  </h1>
  <ol class="breadcrumb">
  <li><a href="../admin/admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Data Guru</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Data Guru</h3> 
          <div class="box-tools pull-left">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahguru"><i class="fa fa-male"></i> Tambah Guru</a>
          </div>
        </div>
        <div class="box-body">

          <div class="table-responsive22">
            <table id="datatable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Id Guru</th>
                  <th>Nama Guru</th>
                  <th>Mapel</th>
                  <th>No Hp</th>
                  
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    $no = 1;
                    $queryview = mysqli_query($koneksi, "SELECT * FROM guru a,mapel b where a.id_mapel=b.id_mapel");
                    while ($row = mysqli_fetch_assoc($queryview)) {
                  ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $row['id_guru'];?></td>
                    <td><?php echo $row['nama_guru'];?></td>
                    <td><?php
                   
                    echo $row['mapel'];?></td>
                    <td><?php echo $row['no_hp'];?></td>

                    <td>
                      <!--<a href="../user/form_edituser.php?id=<?php echo $row['id_user']?>" class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil"></i> Edit</a>-->
                      <a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#updateguru<?php echo $no; ?>"><i class="fa fa-pencil"></i> Edit</a>
                      <a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#deleteguru<?php echo $no; ?>"><i class="fa fa-trash"></i> Delete</a>                      
                      
                      <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deleteguru<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Konfirmasi Delete Data Guru</h3>
                              </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin menghapus <?php echo $row['nama_guru'];?><strong><span class="grt"></span></strong> ?</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                <a href="../guru/function_guru.php?act=deleteguru&id=<?php echo $row['id_guru']; ?>" class="btn btn-primary">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->

                      <!-- modal update user -->
                      <div class="example-modal">
                        <div id="updateguru<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Edit Data Guru</h3>
                              </div>
                              <div class="modal-body">
                                <form action="../guru/function_guru.php?act=updateguru" method="post" role="form">
                                  <?php
                                  $id_guru = $row['id_guru'];
                                  $query = "SELECT * FROM guru a,mapel b WHERE a.id_mapel=b.id_mapel and a.id_guru='$id_guru'";
                                  $result = mysqli_query($koneksi, $query);
                                  while ($row = mysqli_fetch_assoc($result)) {
                                  ?>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Id Guru <span class="text-red">*</span></label>         
                                      <div class="col-sm-8"><input type="text" class="form-control" name="id_guru" placeholder="Id Guru" value="<?php echo $row['id_guru']; ?>" readonly></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nama Guru <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="nama_guru" placeholder="Nama Guru" value="<?php echo $row['nama_guru']; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Mapel <span class="text-red">*</span></label>         
                                      <div class="col-sm-8">
                                      <select name="id_mapel" class="form-control">
                                        <option value="<?php echo $row['id_mapel']; ?>"><?php echo $row['mapel']; ?></option>
                                      <?php
                            include("../koneksidb.php");
                            $sql="select * from mapel";
                            $data=mysqli_query($koneksi,$sql);
                            if(mysqli_num_rows($data)>0)
                            {
                              while($hasil=mysqli_fetch_array($data))
                              {
                                echo "<option value='$hasil[id_mapel]'>$hasil[mapel]</option>";
                              }
                            }
                          ?>
                        </select>
                                        
                                      </div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">No HP <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="no_hp" placeholder="No HP" value="<?php echo $row['no_hp']; ?>"></div>
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
          <div id="tambahguru" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog"> 
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h3 class="modal-title">Registrasi Guru Baru</h3>
                </div>
                <div class="modal-body">
                  <form action="../guru/function_guru.php?act=tambahguru" method="post" role="form">
                  <?php
                  require_once("../genid.php");
                  $kode=kode_auto("guru","id_guru","G",1,4);
                ?>  
                  <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Id Guru <span class="text-red">*</span></label>         
                      <div class="col-sm-8"><input type="text" class="form-control" name="id_guru" placeholder="Id Guru" value="<?php echo $kode; ?>" readonly></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Nama Guru <span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="text" class="form-control" name="nama_guru" placeholder="Nama Guru" value=""></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Mapel <span class="text-red">*</span></label>         
                      <div class="col-sm-8">
                        <select name="id_mapel" class="form-control">
                          <?php
                            include("../koneksidb.php");
                            $sql="select * from mapel";
                            $data=mysqli_query($koneksi,$sql);
                            if(mysqli_num_rows($data)>0)
                            {
                              while($hasil=mysqli_fetch_array($data))
                              {
                                echo "<option value='$hasil[id_mapel]'>$hasil[mapel]</option>";
                              }
                            }
                          ?>
                        </select>
</div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">No HP <span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="text" class="form-control" name="no_hp" placeholder="No HP" value=""></div>
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