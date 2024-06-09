<?php 
include '../template/header_admin.php'; 
include '../koneksidb.php';
$kelas = $_GET['kl'];
?>

<div class="content-wrapper">
<section class="content-header">
  <h1>Data Raport
  </h1>
  <ol class="breadcrumb">
  <li><a href="../admin/admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Data Raport</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Data Raport</h3> 
          <div class="box-tools pull-left">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahmapel"><i class="fa fa-male"></i> Tambah Mapel</a>
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
                  
                  <th>Tugas</th>
                  <th>Harian</th>
                  <th>PTS</th>
                  <th>PAS</th>
                  <th>Raport</th>
                  
                  
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
                    <?php
                    $jml = 0;
                    $total = 0;
                    if($row['tugas1']>0)
                    {
                      $jml++;
                      $total += $row['tugas1'];
                    }
                    if($row['tugas2']>0)
                    {
                      $jml++;
                      $total += $row['tugas2'];
                    }
                    if($row['tugas3']>0)
                    {
                      $jml++;
                      $total += $row['tugas3'];
                    }
                    $rata_rata_tugas = $total / $jml;
                    ?>
                  <td><?php echo $rata_rata_tugas;?></td>
                  <?php
                    $jml = 0;
                    $total = 0;
                    if($row['ph1']>0)
                    {
                      $jml++;
                      $total += $row['ph1'];
                    }
                    if($row['ph2']>0)
                    {
                      $jml++;
                      $total += $row['ph2'];
                    }
                    if($row['ph3']>0)
                    {
                      $jml++;
                      $total += $row['ph3'];
                    }
                    $rata_rata_harian = $total / $jml;
                    ?>
                  <td><?php echo $rata_rata_harian;?></td>
                  <td><?php echo $row['pts'];?></td>
                  <td><?php echo $row['pas'];?></td>
                  <?php
                    $total = $rata_rata_tugas + $rata_rata_harian + $row['pts'] + $row['pas'];
                    $raport= $total / 4;
                  ?>
                  <td><?php echo $raport;?></td>
                  
                  
                  
                    <td>
                      <!--<a href="../user/form_edituser.php?id=<?php echo $row['id_user']?>" class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil"></i> Edit</a>-->
                      <a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#updatemapel<?php echo $no; ?>"><i class="fa fa-pencil"></i> Edit</a>
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
                        <div id="updatemapel<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Edit Data Mapel</h3>
                              </div>
                              <div class="modal-body">
                                <form action="../mapel/function_mapel.php?act=updatemapel" method="post" role="form">
                                  <?php
                                  $id_mapel = $row['id_mapel'];
                                  $query = "SELECT * FROM mapel WHERE id_mapel='$id_mapel'";
                                  $result = mysqli_query($koneksi, $query);
                                  while ($row = mysqli_fetch_assoc($result)) {
                                  ?>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Id Mapel <span class="text-red">*</span></label>         
                                      <div class="col-sm-8"><input type="text" class="form-control" name="id_mapel" placeholder="Id Mapel" value="<?php echo $row['id_mapel']; ?>" readonly></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Mapel <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="mapel" placeholder="Mapel" value="<?php echo $row['mapel']; ?>"></div>
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
                  <h3 class="modal-title">Registrasi Mapel Baru</h3>
                </div>
                <div class="modal-body">
                  <form action="../mapel/function_mapel.php?act=tambahmapel" method="post" role="form">
                  <?php
                  require_once("../genid.php");
                  $kode=kode_auto("mapel","id_mapel","M",1,4);
                ?>  
                  <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Id Mapel <span class="text-red">*</span></label>         
                      <div class="col-sm-8"><input type="text" class="form-control" name="id_mapel" placeholder="Id Mapel" value="<?php echo $kode; ?>" readonly></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                      <label class="col-sm-3 control-label text-right">Mapel <span class="text-red">*</span></label>
                      <div class="col-sm-8"><input type="text" class="form-control" name="mapel" placeholder="Mapel" value=""></div>
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