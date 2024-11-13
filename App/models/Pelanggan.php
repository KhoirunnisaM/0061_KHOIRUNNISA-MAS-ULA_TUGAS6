<?php
class Pelanggan
{
    private $db;

    public function __construct($database)
    {
        $this->db = $database;
    }

    public function create($id_pelanggan, $nama_pelanggan, $alamat)
    {
        $query = "INSERT INTO pelanggan (id_pelanggan, nama_pelanggan, alamat) 
        VALUES (:id_pelanggan, :nama_pelanggan, :alamat)";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_pelanggan', $id_pelanggan);
        $stmt->bindParam(':nama_pelanggan', $nama_pelanggan);
        $stmt->bindParam(':alamat', $alamat);

        return $stmt->execute();
    }

    public function getAll()
    {
        $query = "SELECT * FROM pelanggan";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $query = "SELECT * FROM pelanggan WHERE id_pelanggan = :id_pelanggan";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_pelanggan', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id_pelanggan, $nama_pelanggan, $alamat)
    {
        $query = "UPDATE pelanggan SET nama_pelanggan = :nama_pelanggan, alamat = :alamat WHERE id_pelanggan = :id_pelanggan";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_pelanggan', $id_pelanggan);
        $stmt->bindParam(':nama_pelanggan', $nama_pelanggan);
        $stmt->bindParam(':alamat', $alamat);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $query = "DELETE FROM pelanggan WHERE id_pelanggan = :id_pelanggan";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id_pelanggan', $id);
        return $stmt->execute();
    }
}
