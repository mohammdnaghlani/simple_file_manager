<?php
require_once 'init.php';
$ext = isset($_GET['extension']) && !empty($_GET['extension']) ? strtolower($_GET['extension']) : '*';

if (isset($_GET['file_name']) && !empty($_GET['file_name'])) {
  $file_name = $_GET['file_name'];
  $path = BASE_PATH . 'gallery/' . $file_name;
  if (file_exists($path)) {
    unlink($path);
  }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>پنل مدیریت | صفحه خالی</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= link_url('dist/css/adminlte.min.css'); ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- bootstrap rtl -->
  <link rel="stylesheet" href="<?= link_url('dist/css/bootstrap-rtl.min.css'); ?>">
  <!-- template rtl version -->
  <link rel="stylesheet" href="<?= link_url('dist/css/custom-style.css'); ?>">
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="../../index3.html" class="nav-link">خانه</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">تماس</a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="جستجو" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
      </form>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <div>
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="https://www.gravatar.com/avatar/52f0fbcbedee04a121cba8dad1174462?s=200&d=mm&r=g" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
              <a href="#" class="d-block">حسام موسوی</a>
            </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
              <li class="nav-item ">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fa fa-upload"></i>
                  <p>
                    اپلود کردن فایل
                  </p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>فایل منیجر</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="#">خانه</a></li>
                <li class="breadcrumb-item active">فایل منیجر</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">لیست فایل ها</h3>
            <div>
              <a href="?extension=png">png</a>
              |
              <a href="?extension=jpg">jpg</a>
            </div>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="row ">
              <?php $files = fetch_file('gallery', $ext); ?>
              <?php foreach ($files as $key =>  $img) : ?>
                <div class="col-12 col-sm-3 mt-1">
                  <div class="p-1 border rounded text-center">
                    <img src="<?= BASE_URL . $img; ?>" class="img-style-custom shadow-sm" alt=" fileName">
                    <a href="?file_name=<?= $name = explode('\\', $img)[1]; ?>" style="fotn-size : 10px"><i class="fa fa-times text-danger"></i></a>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- /.card-body -->
          <div class="card-footer">
            <button type="button" class="btn btn-primary mt-2" data-toggle="collapse" data-target="#demo">آپلود فایل</button>
            <div id="demo" class="collapse mt-2">
              <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="exampleInputFile">ارسال فایل</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name='upfile' class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">انتخاب فایل</label>
                    </div>
                    <div class="input-group-append">
                      <input type="submit" name="submit" class="btn btn-success" value="ارسال">
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <!-- /.card-footer-->
        </div>
        <!-- /.card -->
        <!-- Default box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">اسلایدر تصاویر</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="row justify-content-center ">
              <div class="col-12 col-md-6 border shadow-sm">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <?php $count = count($files); ?>
                  <ol class="carousel-indicators">
                    <?php for ($i = 0; $i < $count; $i++) : ?>
                      <li data-target="#carouselExampleIndicators"
                       data-slide-to="<?= $i; ?>" 
                       class="<?= ($i == 0 ? 'active' : ''); ?>">
                      </li>
                    <?php endfor; ?>
                  </ol>
                  <div class="carousel-inner" style="height=400px">
                    <?php foreach ($files as $key => $file) : ?>
                      <div class="carousel-item <?= ($key == 0 ? 'active' : ''); ?>">
                        <img class="d-block w-100" src="<?= BASE_URL . $file; ?>" alt="<?= $file; ?>">
                      </div>
                    <?php endforeach; ?>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <strong>CopyLeft &copy; 2018 <a href="http://github.com/hesammousavi/">حسام موسوی</a>.</strong>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?= link_url('plugins/jquery/jquery.min.js'); ?>"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= link_url('plugins/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <!-- SlimScroll -->
  <script src="<?= link_url('plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
  <!-- FastClick -->
  <script src="<?= link_url('plugins/fastclick/fastclick.js'); ?>"></script>
  <!-- AdminLTE App -->
  <script src="<?= link_url('dist/js/adminlte.min.js'); ?>"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= link_url('dist/js/demo.js'); ?>"></script>
</body>

</html>