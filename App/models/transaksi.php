<?php
class Transaksi
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function getAllTransaksi()
    {
        $query = "SELECT t.id, b.kode_barang, p.id_pelanggan, t.jumlah, t.total_harga, t.tanggal
                  FROM transaksi t
                  JOIN barang b ON t.kode_barang = b.kode_barang
                  JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan";
        return $this->db->query($query)->fetchAll();
    }

    public function create($data)
{
    $data['tanggal'] = date('Y-m-d H:i:s');
    $query = "INSERT INTO transaksi (id, kode_barang, id_pelanggan, jumlah, total_harga, tanggal)
              VALUES (:id, :kode_barang, :id_pelanggan, :jumlah, :total_harga, :tanggal)";
    $stmt = $this->db->prepare($query);
    $stmt->execute($data);
}

    public function checkbarangExists($kode_barang)
    {
        $query = "SELECT COUNT(*) FROM barang WHERE kode_barang = :kode_barang";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['kode_barang' => $kode_barang]);
        return $stmt->fetchColumn() > 0;
    }

    public function checkPelangganExists($id_pelanggan)
    {
        $query = "SELECT COUNT(*) FROM pelanggan WHERE id_pelanggan = :id_pelanggan";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id_pelanggan' => $id_pelanggan]);
        return $stmt->fetchColumn() > 0;
    }

    public function getAllbarang()
    {
        $query = "SELECT * FROM barang";
        return $this->db->query($query)->fetchAll();
    }

    public function getAllPelanggan()
    {
        $query = "SELECT * FROM pelanggan";
        return $this->db->query($query)->fetchAll();
    }

    public function getDetailTransaksi($id)
    {
        $query = "SELECT t.id, b.nama_barang, p.nama_pelanggan, t.jumlah, b.harga, t.total_harga, t.tanggal 
              FROM transaksi t
              JOIN barang b ON t.kode_barang = b.kode_barang
              JOIN pelanggan p ON t.id_pelanggan = p.id_pelanggan
              WHERE t.id = :id"; 

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
