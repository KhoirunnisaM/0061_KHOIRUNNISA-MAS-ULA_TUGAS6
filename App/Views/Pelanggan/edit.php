<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Penjualan-0061</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/AdminLTE/dist/css/adminlte.min.css">
    <style>
        .form-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .form-title {
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

<div class="container form-container">
    <h2 class="form-title">Edit Pelanggan</h2>
    <form action="index.php?controller=pelanggan&action=update" method="POST">

        <div class="form-group">
            <label for="id_pelanggan">ID Pelanggan:</label>
            <input type="text" class="form-control" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>" required>
        </div>

        <div class="form-group">
            <label for="nama_pelanggan">Nama Pelanggan:</label>
            <input type="text" class="form-control" name="nama_pelanggan" value="<?= $pelanggan['nama_pelanggan'] ?>" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" class="form-control" name="alamat" value="<?= $pelanggan['alamat'] ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="index.php?controller=pelanggan&action=index" class="btn btn-outline-light">Kembali</a>
    </form>
</div>
<!-- jQuery -->
<script src="public/AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/AdminLTE/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="public/AdminLTE/dist/js/demo.js"></script>
</body>
</html>