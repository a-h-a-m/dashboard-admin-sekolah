<?php 
include '../template/header_admin.php'; 
include '../koneksidb.php';
$kls = substr($_GET['kl'],4,1);
$kelas = $kls + 6;
$status = $_GET['st'];
$kel=$_GET['kl'];
?>

<div class="content-wrapper">
<section class="content-header">
  <h1>Data Kelas <?php echo $kelas; ?>
  </h1>
  <ol class="breadcrumb">
  <li><a href="../admin/admin.php"><i class="fa fa-dashboard"></i> Home</a></li>
  <li class="active">Data Kelas <?php echo $kelas; ?></li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">List Data Kelas <?php echo $kelas; ?></h3> 
          <div class="box-tools pull-left">
            
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
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>No HP</th>
                  
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                  <?php
                    $no = 1;
                    $queryview = mysqli_query($koneksi, "SELECT * FROM siswa where status='$status' and id_kelas='$kel'");
                    if(mysqli_num_rows($queryview)>0)
                    {
                    while ($row = mysqli_fetch_assoc($queryview)) {
                  ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $row['nis'];?></td>
                    <td><?php echo $row['nama_siswa'];?></td>
                    <td><?php echo $row['tempat_lahir'];?></td>
                    <td><?php echo $row['tanggal_lahir'];?></td>
                    <td><?php echo $row['no_hp'];?></td>
                    
                    <td>
                      <!--<a href="../user/form_edituser.php?id=<?php echo $row['id_user']?>" class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil"></i> Edit</a>-->
                      <?php
                        if($row['id_kelas']=="K0003")
                        {
                      ?>
                      <a href="#" class="btn btn-info btn-flat btn-xs" data-toggle="modal" data-target="#diterimappdb<?php echo $no; ?>"><i class="fa fa-thumbs-o-up"></i> Lulus</a>
                      <?php }
                      else
                      { ?>
                      <a href="#" class="btn btn-success btn-flat btn-xs" data-toggle="modal" data-target="#diterimappdb<?php echo $no; ?>"><i class="fa fa-thumbs-o-up"></i> Naik Kelas</a>
                      <?php 
                      }
                      ?>
			<a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#nilai<?php echo $no; ?>"><i class="fa fa-pencil"></i> Nilai</a>
                      
                      <a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#updateppdb<?php echo $no; ?>"><i class="fa fa-pencil"></i> Edit</a>
                      <a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#deleteppdb<?php echo $no; ?>"><i class="fa fa-trash"></i> Delete</a>                      
                      
                      <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deleteppdb<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Konfirmasi Delete Data Kelas <?php echo $kelas; ?></h3>
                              </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin menghapus <?php echo $row['nama_siswa'];?><strong><span class="grt"></span></strong> ?</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                <a href="../aktif/function_aktif.php?act=deleteppdb&id=<?php echo $row['id_siswa']; ?>&kl=<?php echo $row['id_kelas']; ?>" class="btn btn-primary">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->

                       <!-- modal diterima -->
                       <div class="example-modal">
                        <div id="diterimappdb<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?php
                        if($row['id_kelas']=="K0003")
                        {
                      ?>
                                <h3 class="modal-title">Konfirmasi Lulus</h3>
                              </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin meluluskan <?php echo $row['nama_siswa'];?><strong><span class="grt"></span></strong> ?</h4>
                                <?php }
                      else
                      { ?>
                                <h3 class="modal-title">Konfirmasi Naik Kelas</h3>
                              </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin menaikkan <?php echo $row['nama_siswa'];?><strong><span class="grt"></span></strong> ?</h4>
                                <?php
                      }
                      ?>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                <a href="../aktif/function_aktif.php?act=diterimappdb&id=<?php echo $row['id_siswa']; ?>&kl=<?php echo $row['id_kelas']; ?>" class="btn btn-success">Naik Kelas</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal diterima -->

			<!-- modal update user -->
                      <div class="example-modal">
                        <div id="nilai<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Input Nilai</h3>
                              </div>
                              <div class="modal-body">
                                <form action="../aktif/function_aktif.php?act=nilai" method="post" role="form">
                                  <?php
                                  $id_siswa = $row['id_siswa'];
                                  $query = "SELECT * FROM siswa a,nilai b WHERE a.id_siswa='$id_siswa' and a.nis=b.nis";
                                  $result = mysqli_query($koneksi, $query);
                                  while ($row = mysqli_fetch_assoc($result)) {
                                  ?>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Id Siswa <span class="text-red">*</span></label>         
                                      <div class="col-sm-8"><input type="text" class="form-control" name="id_siswa" placeholder="Id Siswa" value="<?php echo $row['id_siswa']; ?>" readonly></div>
                                    </div>
                                  </div>
					<div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">NIS <span class="text-red">*</span></label>         
                                      <div class="col-sm-8"><input type="text" class="form-control" name="nis" placeholder="NIS" value="<?php echo $row['nis']; ?>" readonly></div>
                                    </div>
                                  </div>
                                  
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nama <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $row['nama_siswa']; ?>" readonly></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nilai Tugas 1 <span class="text-red">*</span></label>
                                      <div class="col-sm-8">
	<?php
	if($row['tugas1']>0)
	{	
?>
<input type="text" class="form-control" name="tugas1" placeholder="Tugas1" value="<?php echo $row['tugas1']; ?>" readonly></div>
<?php
}
else
{
?>
<input type="text" class="form-control" name="tugas1"></div>
<?php
}
?>
                                    </div>
                                  </div>
					<div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nilai Tugas 2 <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><?php
	if($row['tugas2']>0)
	{	
?><input value="<?php echo $row['tugas2']; ?>" type="text" class="form-control" name="tugas2" placeholder="Tugas2" readonly></div>
<?php
}
else
{
?>
<input type="text" class="form-control" name="tugas2"></div>
<?php
}
?>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nilai Tugas 3 <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><?php
	if($row['tugas3']>0)
	{	
?><input value="<?php echo $row['tugas3']; ?>" type="text" class="form-control" name="tugas3" placeholder="Tugas3" readonly></div>
     <?php
}
else
{
?>
<input type="text" class="form-control" name="tugas3"></div>
<?php
}
?>                             
					</div>
                                  </div>
					<div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nilai PH 1 <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><?php
	if($row['ph1']>0)
	{	
?><input value="<?php echo $row['ph1']; ?>" type="text" class="form-control" name="ph1" placeholder="PH1" readonly></div>
<?php
}
else
{
?>
<input type="text" class="form-control" name="ph1"></div>
<?php
}
?>
                                    </div>
                                  </div>
					<div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nilai PH 2 <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><?php
	if($row['ph2']>0)
	{	
?><input value="<?php echo $row['ph2']; ?>" type="text" class="form-control" name="ph2" placeholder="PH2" readonly></div>
<?php
}
else
{
?>
<input type="text" class="form-control" name="ph2"></div>
<?php
}
?>
                                    </div>
                                  </div>
					<div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nilai PH 3 <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><?php
	if($row['ph3']>0)
	{	
?><input value="<?php echo $row['ph3']; ?>" type="text" class="form-control" name="ph3" placeholder="PH3" readonly></div>
<?php
}
else
{
?>
<input type="text" class="form-control" name="ph3"></div>
<?php
}
?>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nilai PTS <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><?php
	if($row['pts']>0)
	{	
?><input value="<?php echo $row['pts']; ?>" type="text" class="form-control" name="pts" placeholder="PTS" readonly></div>
<?php
}
else
{
?>
<input type="text" class="form-control" name="pts"></div>
<?php
}
?>
                                    </div>
                                  </div>
					<div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nilai PAS <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><?php
	if($row['pas']>0)
	{	
?><input value="<?php echo $row['pas']; ?>" type="text" class="form-control" name="pas" placeholder="PAS" readonly></div>
<?php
}
else
{
?>
<input type="text" class="form-control" name="pas"></div>
<?php
}
?>
                                    </div>
                                  </div>
                                              
                      
                    </div>
                                  <div class="modal-footer">
                                    <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
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
                    


                      <!-- modal update user -->
                      <div class="example-modal">
                        <div id="updateppdb<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">Edit Data PPDB</h3>
                              </div>
                              <div class="modal-body">
                                <form action="../aktif/function_aktif.php?act=updateppdb" method="post" role="form">
                                  <?php
                                  $id_siswa = $row['id_siswa'];
                                  $query = "SELECT * FROM siswa WHERE id_siswa='$id_siswa'";
                                  $result = mysqli_query($koneksi, $query);
                                  while ($row = mysqli_fetch_assoc($result)) {
                                  ?>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Id Siswa <span class="text-red">*</span></label>         
                                      <div class="col-sm-8"><input type="text" class="form-control" name="id_siswa" placeholder="Id Siswa" value="<?php echo $row['id_siswa']; ?>" readonly></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nama <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $row['nama_siswa']; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Tempat Lahir <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat lahir" value="<?php echo $row['tempat_lahir']; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Tanggal Lahir <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="tanggal_lahir" placeholder="Tanggal lahir" value="<?php echo $row['tanggal_lahir']; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Asal Sekolah <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="asal_sekolah" placeholder="Asal sekolah" value="<?php echo $row['asal_sekolah']; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Nilai <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="nilai" placeholder="Nilai" value="<?php echo $row['nilai']; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">Jarak <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="jarak" placeholder="Jarak" value="<?php echo $row['jarak']; ?>"></div>
                                    </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="row">
                                      <label class="col-sm-3 control-label text-right">No HP <span class="text-red">*</span></label>
                                      <div class="col-sm-8"><input type="text" class="form-control" name="no_hp" placeholder="No HP" value="<?php echo $row['no_hp']; ?>"></div>
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
                  }
                  else
                  {
                    echo "Data masih kosong";
                  }
                  ?>
              </tbody>
            </table>
          </div> 
        </div>

        
      </div>
    </div>
  </div>
</section><!-- /.content -->
</div>

<?php include '../template/footer.php'; ?>