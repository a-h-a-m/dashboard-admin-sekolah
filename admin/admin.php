<?php include '../template/header_admin.php'; ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Sistem Rencana Harian Kerja</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="row">
          <div class="callout callout-info col-md-3">
          <h4>Jumlah Guru</h4>
          <?php
            include("../koneksidb.php");
            $sqlguru = "select count(nama_guru) as jml from guru";
            $dataguru = mysqli_query($koneksi,$sqlguru);
            if(mysqli_num_rows($dataguru)>0)
            {
              $hasilguru = mysqli_fetch_array($dataguru);
              echo "<h1>".$hasilguru['jml']."</h1>";
            }          
          ?>
          </div>
        
          <div class="callout callout-info col-md-3">
          <h4>Jumlah Siswa</h4>
          <?php
            $sqlsiswa = "select count(nama_siswa) as jml from siswa";
            $datasiswa = mysqli_query($koneksi,$sqlsiswa);
            if(mysqli_num_rows($datasiswa)>0)
            {
              $hasilsiswa = mysqli_fetch_array($datasiswa);
              echo "<h1>".$hasilsiswa['jml']."</h1>";
            }          
          ?>
          </div>
          <div class="callout callout-info col-md-3">
          <h4>Jumlah Mapel</h4>
          <?php
            $sqlmapel = "select count(mapel) as jml from mapel";
            $datamapel = mysqli_query($koneksi,$sqlmapel);
            if(mysqli_num_rows($datamapel)>0)
            {
              $hasilmapel = mysqli_fetch_array($datamapel);
              echo "<h1>".$hasilmapel['jml']."</h1>";
            }          
          ?>  
          </div>
          <div class="callout callout-info col-md-3">
          <h4>Jumlah Kelas</h4>
          <?php
            $sqlkelas = "select count(kelas) as jml from kelas";
            $datakelas = mysqli_query($koneksi,$sqlkelas);
            if(mysqli_num_rows($datakelas)>0)
            {
              $hasilkelas = mysqli_fetch_array($datakelas);
              echo "<h1>".$hasilkelas['jml']."</h1>";
            }          
          ?> 
          </div>
        </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

<?php include '../template/footer.php'; ?>