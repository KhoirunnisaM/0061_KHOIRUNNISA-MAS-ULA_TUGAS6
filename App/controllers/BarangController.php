<?php
require_once __DIR__ . '/../models/Barang.php';

class BarangController
{
    private $model;

    public function __construct($database)
    {
        $this->model = new Barang($database);
    }

    public function create()
    {
        require __DIR__ . '/../views/Barang/tambah.php';
    }

    public function store()
    {
        try {
            $kode_barang = $_POST['kode_barang'];
            $nama_barang = $_POST['nama_barang'];
            $harga = $_POST['harga'];
            $stok = $_POST['stok'];

            $this->model->create($kode_barang, $nama_barang, $harga, $stok);

            header("Location: index.php?controller=barang&action=index");
            exit();
        } catch (Exception $e) {
            echo $e->getMessage(); 
        }
    }

    public function index()
    {
        $data = $this->model->getAll();
        $path = realpath(__DIR__ . '/../views/Barang/index.php');

        if ($path && file_exists($path)) {
            require_once $path;
        } else {
            echo "File index.php tidak ditemukan di path absolut yang terdeteksi: " . __DIR__ . '/../views/Barang/index.php';
        }
    }

    public function edit($id)
    {
        $Barang = $this->model->getById($id);
        require __DIR__ . '/../views/Barang/edit.php';
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header("Location: index.php?controller=barang&action=index");
        exit();
    }

    public function update()
    {
        $kode_barang = $_POST['kode_barang'];
        $nama_barang = $_POST['nama_barang'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $this->model->update($kode_barang, $nama_barang, $harga, $stok);

        header("Location: index.php?controller=barang&action=index");
        exit();
    }
}
