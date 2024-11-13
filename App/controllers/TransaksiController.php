<?php
require_once __DIR__ . '/../models/Transaksi.php';

class TransaksiController
{
    private $transaksiModel;

    public function __construct($db)
    {
        $this->transaksiModel = new Transaksi($db); 
    }

    public function index()
    {
        $transaksiList = $this->transaksiModel->getAllTransaksi();
        require_once __DIR__ . '/../views/transaksi/index.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../views/transaksi/tambah.php'; 
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = uniqid('TRX');
            $kode_barang = $_POST['kode_barang'];
            $id_pelanggan = $_POST['id_pelanggan'];
            $jumlah = $_POST['jumlah'];
            $harga_barang = $_POST['harga_barang'];
            $total_harga = $harga_barang * $jumlah;
            $tanggal = $_POST['tanggal'];

            $data = [
                'id' => $id,
                'kode_barang' => $kode_barang,
                'id_pelanggan' => $id_pelanggan,
                'jumlah' => $jumlah,
                'total_harga' => $total_harga,
                'tanggal' => $tanggal
            ];

            $this->transaksiModel->create($data);
        }

        header("Location: index.php?controller=transaksi&action=index");
        exit();
    }

    public function detail($id)
    {
        $transaksiDetail = $this->transaksiModel->getDetailTransaksi($id);

        if (!$transaksiDetail) {
            echo "Detail transaksi tidak ditemukan.";
            return;
        }

        require_once __DIR__ . '/../views/transaksi/detail.php';
    }
}
