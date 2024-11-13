<?php
class Barang
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function create($kode_barang, $nama_barang, $harga, $stok)
    {
        $query = "INSERT INTO barang (kode_barang, nama_barang, harga, stok) 
        VALUES (:kode_barang, :nama_barang, :harga, :stok)";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':kode_barang', $kode_barang);
        $stmt->bindParam(':nama_barang', $nama_barang);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);

        return $stmt->execute();
    }

    public function getAll()
    {
        $query = "SELECT * FROM barang";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM barang WHERE kode_barang = :kode_barang";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':kode_barang', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($kode_barang, $nama_barang, $harga, $stok)
    {
        $query = "UPDATE barang SET nama_barang = :nama_barang, harga = :harga, stok = :stok WHERE kode_barang = :kode_barang";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':kode_barang', $kode_barang);
        $stmt->bindParam(':nama_barang', $nama_barang);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM barang WHERE kode_barang = :kode_barang";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':kode_barang', $id);
        return $stmt->execute();
    }
}
