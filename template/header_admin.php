<?php
  session_start();
  /*echo $_SESSION['level'];
  echo $_SESSION['nama'];*/
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIS | Sistem Informasi Sekolah</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../aset/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../aset/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../aset/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../aset/dist/css/skins/_all-skins.min.css">
    <!-- jQuery 2.1.4 -->
    <script src="../aset/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="https://cdn.tiny.cloud/1/90olzunyrtcx0or8xsdu2uk6iun0uozkp7lk03ng9quhvsvn/tinymce/5/tinymce.min.js"></script>

    <script>
        // Inisialisasi TinyMCE
        tinymce.init({
            selector: '#Isi'
        });
    </script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">SIS</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">Sistem Informasi Sekolah</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="../aset/img/avatar.png" class="user-image" alt="User Image">
                  <span class="hidden-xs">Welcome <b><?php echo $_SESSION['username']?></b></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="../aset/img/avatar.png" class="img-circle" alt="User Image">
                    <p>
                      Admin - SIS
                      <small>Created July. 2023</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="../logout.php" class="btn btn-default btn-flat">Logout</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="../aset/img/avatar.png" class="img-thumbnail" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Administrator</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form> -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="../admin/admin.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Data Master</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../user/data_user.php"><i class="fa fa-circle-o"></i> User</a></li>
                
                <li><a href="../kelas/data_kelas.php"><i class="fa fa-circle-o"></i> Kelas</a></li>
                
                <li><a href="../mapel/data_mapel.php"><i class="fa fa-circle-o"></i> Mapel</a></li>
                <li><a href="../guru/data_guru.php"><i class="fa fa-circle-o"></i> Guru</a></li>
                
              </ul>
            </li>
            <li class="header">DATA SISWA</li>
            <li><a href="../ppdb/data_ppdb.php"><i class="fa fa-edit"></i> <span>PPDB</span></a></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Aktif</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../aktif/data_aktif.php?st=Aktif&kl=K0001"><i class="fa fa-circle-o"></i> Kelas 7</a></li>
                <li><a href="../aktif/data_aktif.php?st=Aktif&kl=K0002"><i class="fa fa-circle-o"></i> Kelas 8</a></li>
                <li><a href="../aktif/data_aktif.php?st=Aktif&kl=K0003"><i class="fa fa-circle-o"></i> Kelas 9</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Mutasi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../mutasi/data_mutasi.php?ket=mutasi&mt=masuk"><i class="fa fa-circle-o"></i> Masuk</a></li>
                <li><a href="../mutasi/data_mutasi.php?ket=mutasi&mt=keluar"><i class="fa fa-circle-o"></i> Keluar</a></li>
                
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-edit"></i> <span>Alumni</span></a></li>
            
            
            
            <li class="header">KELAS VII</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Nilai Tugas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php
                  include("../koneksidb.php");
                  $sqlmapel = "select * from mapel";
                  $datamapel = mysqli_query($koneksi,$sqlmapel);
                  if(mysqli_num_rows($datamapel)>0)
                  {
                    while($hasilmapel=mysqli_fetch_array($datamapel))
                    {
                      ?>
                      <li><a href="../nilai_tugas/data_tugas.php?kl=K0001&mpl=<?php echo $hasilmapel['id_mapel']; ?>"><i class="fa fa-circle-o"></i> <?php echo $hasilmapel['mapel']; ?></a></li>
                      <?php
                    }
                  }
                ?>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Nilai PH</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <?php
                  $sqlmapel = "select * from mapel";
                  $datamapel = mysqli_query($koneksi,$sqlmapel);
                  if(mysqli_num_rows($datamapel)>0)
                  {
                    while($hasilmapel=mysqli_fetch_array($datamapel))
                    {
                      ?>
                      <li><a href="../nilai/data_nilai.php?kl=K0001&ket=Ulangan&mpl=<?php echo $hasilmapel['id_mapel']; ?>"><i class="fa fa-circle-o"></i> <?php echo $hasilmapel['mapel']; ?></a></li>
                      <?php
                    }
                  }
                ?>
                </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Nilai Test</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <?php
                  $sqlmapel = "select * from mapel";
                  $datamapel = mysqli_query($koneksi,$sqlmapel);
                  if(mysqli_num_rows($datamapel)>0)
                  {
                    while($hasilmapel=mysqli_fetch_array($datamapel))
                    {
                      ?>
                      <li><a href="../nilai/data_nilai.php?kl=K0001&ket=Test&mpl=<?php echo $hasilmapel['id_mapel']; ?>"><i class="fa fa-circle-o"></i> <?php echo $hasilmapel['mapel']; ?></a></li>
                      <?php
                    }
                  }
                ?>
                </ul>
            </li>
            <li>
              <a href="../rapor/data_rapor.php?kl=K0001">
                <i class="fa fa-edit"></i> <span>Raport</span>
                </a>   
            </li>
            <li class="header">KELAS VIII</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Nilai Tugas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php
                  $sqlmapel = "select * from mapel";
                  $datamapel = mysqli_query($koneksi,$sqlmapel);
                  if(mysqli_num_rows($datamapel)>0)
                  {
                    while($hasilmapel=mysqli_fetch_array($datamapel))
                    {
                      ?>
                      <li><a href="../nilai/data_nilai.php?kl=K0002&ket=Tugas&mpl=<?php echo $hasilmapel['id_mapel']; ?>"><i class="fa fa-circle-o"></i> <?php echo $hasilmapel['mapel']; ?></a></li>
                      <?php
                    }
                  }
                ?>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Nilai PH</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <?php
                  $sqlmapel = "select * from mapel";
                  $datamapel = mysqli_query($koneksi,$sqlmapel);
                  if(mysqli_num_rows($datamapel)>0)
                  {
                    while($hasilmapel=mysqli_fetch_array($datamapel))
                    {
                      ?>
                      <li><a href="../nilai/data_nilai.php?kl=K0002&ket=Ulangan&mpl=<?php echo $hasilmapel['id_mapel']; ?>"><i class="fa fa-circle-o"></i> <?php echo $hasilmapel['mapel']; ?></a></li>
                      <?php
                    }
                  }
                ?>
                </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Nilai Test</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <?php
                  $sqlmapel = "select * from mapel";
                  $datamapel = mysqli_query($koneksi,$sqlmapel);
                  if(mysqli_num_rows($datamapel)>0)
                  {
                    while($hasilmapel=mysqli_fetch_array($datamapel))
                    {
                      ?>
                      <li><a href="../nilai/data_nilai.php?kl=K0002&ket=Test&mpl=<?php echo $hasilmapel['id_mapel']; ?>"><i class="fa fa-circle-o"></i> <?php echo $hasilmapel['mapel']; ?></a></li>
                      <?php
                    }
                  }
                ?>
                </ul>
            </li>
            <li>
              <a href="../rapor/data_rapor.php?kl=K0002">
                <i class="fa fa-edit"></i> <span>Raport</span>
                </a>   
            </li>
            <li class="header">KELAS IX</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Nilai Tugas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php
                  $sqlmapel = "select * from mapel";
                  $datamapel = mysqli_query($koneksi,$sqlmapel);
                  if(mysqli_num_rows($datamapel)>0)
                  {
                    while($hasilmapel=mysqli_fetch_array($datamapel))
                    {
                      ?>
                      <li><a href="../nilai/data_nilai.php?kl=K0003&ket=Tugas&mpl=<?php echo $hasilmapel['id_mapel']; ?>"><i class="fa fa-circle-o"></i> <?php echo $hasilmapel['mapel']; ?></a></li>
                      <?php
                    }
                  }
                ?>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Nilai PH</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <?php
                  $sqlmapel = "select * from mapel";
                  $datamapel = mysqli_query($koneksi,$sqlmapel);
                  if(mysqli_num_rows($datamapel)>0)
                  {
                    while($hasilmapel=mysqli_fetch_array($datamapel))
                    {
                      ?>
                      <li><a href="../nilai/data_nilai.php?kl=K0003&ket=Ulangan&mpl=<?php echo $hasilmapel['id_mapel']; ?>"><i class="fa fa-circle-o"></i> <?php echo $hasilmapel['mapel']; ?></a></li>
                      <?php
                    }
                  }
                ?>
                </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Nilai Test</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              <?php
                  $sqlmapel = "select * from mapel";
                  $datamapel = mysqli_query($koneksi,$sqlmapel);
                  if(mysqli_num_rows($datamapel)>0)
                  {
                    while($hasilmapel=mysqli_fetch_array($datamapel))
                    {
                      ?>
                      <li><a href="../nilai/data_nilai.php?kl=K0003&ket=Test&mpl=<?php echo $hasilmapel['id_mapel']; ?>"><i class="fa fa-circle-o"></i> <?php echo $hasilmapel['mapel']; ?></a></li>
                      <?php
                    }
                  }
                ?>
                </ul>
            </li>
            <li>
              <a href="../rapor/data_rapor.php?kl=K0003">
                <i class="fa fa-edit"></i> <span>Raport</span>
                </a>   
            </li>
            <li class="header">POSTING</li>
            <li><a href="../kategori/data_kategori.php"><i class="fa fa-edit"></i> <span>Kategori</span></a></li>
            <li><a href="../berita/data_berita.php"><i class="fa fa-edit"></i> <span>Berita</span></a></li>

            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>