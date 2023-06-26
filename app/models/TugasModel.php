<?php

class TugasModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllTask($user)
    {
        // Query untuk mengambil tugas berdasarkan pengguna
        $query = 'SELECT * FROM tugas WHERE user_id = :user_id';
        $this->db->query($query);
        $this->db->bind(':user_id', $user['id']);

        return $this->db->resultSet();
    }

    public function addTask($task)
    {
        $this->db->query('INSERT INTO tugas (user_id, nama_tugas, deskripsi_tugas, tanggal_dibuat) VALUES(:user_id, :nama_tugas, :deskripsi_tugas, :tanggal_dibuat)');
        $this->db->bind(':user_id', $task['user_id']);
        $this->db->bind(':nama_tugas', $task['nama_tugas']);
        $this->db->bind(':deskripsi_tugas', $task['deskripsi_tugas']);
        $this->db->bind(':tanggal_dibuat', $task['tanggal_dibuat']);


        return $this->db->execute();
    }

    public function updateTask($task)
    {
        $this->db->query('UPDATE tugas SET nama_tugas = :nama_tugas, deskripsi_tugas = :deskripsi_tugas WHERE id = :id');
        $this->db->bind(':nama_tugas', $task['nama_tugas']);
        $this->db->bind(':deskripsi_tugas', $task['deskripsi_tugas']);
        $this->db->bind(':id', $task['id']);

        return $this->db->execute();
    }

    public function deleteTask($id)
    {
        $this->db->query('DELETE FROM tugas WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();

        return $this->db->rowCount() > 0; // Mengembalikan true jika ada baris yang terpengaruh
    }
}
