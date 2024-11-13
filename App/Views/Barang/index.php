<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Penjualan-0061</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="public/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Penjualan-0061</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="index.php?controller=home&action=index" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p>Home</p>
            </a>
          </li>
               <li class="nav-item">
            <a href="index.php?controller=barang&action=index" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p class="text">Barang</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?controller=pelanggan&action=index" class="nav-link">
              <i class="nav-icon far fa-circle text-success"></i>
              <p>Pelanggan</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="index.php?controller=transaksi&action=index" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Transaksi</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="index.php?controller=home&action=index" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
          <div class="col-sm-6">
            <h1>Daftar Barang</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
        <a href="index.php?controller=barang&action=create" class="btn btn-outline-success mb-3">Tambah Data</a>

    <table class="table table-striped table-bordered">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $key => $barang): ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $barang['kode_barang'] ?></td>
                    <td><?= $barang['nama_barang'] ?></td>
                    <td><?= number_format($barang['harga'], 2, '.', ',') ?></td>
                    <td><?= $barang['stok'] ?></td>
                    <td>
                        <a href="index.php?controller=barang&action=edit&id=<?= $barang['kode_barang'] ?>" class="btn btn-sm btn-outline-warning">Edit</a>
                        <a href="index.php?controller=barang&action=delete&id=<?= $barang['kode_barang'] ?>" class="btn btn-sm btn-outline-danger" 
                        onclick="return confirm('Kamu yakin akan menghapus data ini ?');">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

        </div>
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   
  <footer class="main-footer">
    <div class="float-center d-none d-sm-block">
    <strong>Copyright &copy; 23.230.0061 - KHOIRUNNISA' MAS'ULA</strong>  </footer>
 
    <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="public/js/demo.js"></script>
</body>
</html>

