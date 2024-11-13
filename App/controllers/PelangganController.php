<?php
require_once __DIR__ . '/../models/Pelanggan.php';

class PelangganController
{
    private $model;

    public function __construct($database)
    {
        $this->model = new Pelanggan($database);
    }

    public function create()
    {
        require __DIR__ . '/../views/pelanggan/tambah.php';
    }

    public function store()
    {
        try {
            $id_pelanggan = $_POST['id_pelanggan'];
            $nama_pelanggan = $_POST['nama_pelanggan'];
            $alamat = $_POST['alamat'];

            $this->model->create($id_pelanggan, $nama_pelanggan, $alamat);

            header("Location: index.php?controller=pelanggan&action=index");
            exit();
        } catch (Exception $e) {
            echo $e->getMessage(); 
        }
    }

    public function index()
    {
        $data = $this->model->getAll();
        $path = realpath(__DIR__ . '/../views/pelanggan/index.php');

        if ($path && file_exists($path)) {
            require_once $path;
        } else {
            echo "File index.php tidak ditemukan di path absolut yang terdeteksi: " . __DIR__ . '/../views/pelanggan/index.php';
        }
    }

    public function edit($id)
    {
        $pelanggan = $this->model->getById($id);
        require __DIR__ . '/../views/pelanggan/edit.php';
    }

    public function delete($id)
    {
        $this->model->delete($id);
        header("Location: index.php?controller=pelanggan&action=index");
        exit();
    }

    public function update()
    {
        $id_pelanggan = $_POST['id_pelanggan'];
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $alamat = $_POST['alamat'];

        $this->model->update($id_pelanggan, $nama_pelanggan, $alamat);

        header("Location: index.php?controller=pelanggan&action=index");
        exit();
    }
}
