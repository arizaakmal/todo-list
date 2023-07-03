<?php

class TugasModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllTask($userId)
    {
        // Query untuk mengambil tugas berdasarkan user_id
        $query = 'SELECT * FROM tugas WHERE user_id = :user_id';
        $this->db->query($query);
        $this->db->bind(':user_id', $userId);

        return $this->db->resultSet();
    }



    public function addTask($task)
    {
        // Ambil user_id dari pengguna yang sedang login
        $user_id = $_SESSION['user_id']; // Ubah sesuai dengan kunci session yang sesuai

        // Tambahkan logika untuk mengatur tanggal_dibuat
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_dibuat = date('Y-m-d H:i:s');

        // Tambahkan logika untuk mengatur deadline


        $this->db->query('INSERT INTO tugas (user_id, nama_tugas, deskripsi_tugas, tanggal_dibuat, deadline, status) VALUES(:user_id, :nama_tugas, :deskripsi_tugas, :tanggal_dibuat, :deadline, :status)');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':nama_tugas', $task['nama_tugas']);
        $this->db->bind(':deskripsi_tugas', $task['deskripsi_tugas']);
        $this->db->bind(':tanggal_dibuat', $tanggal_dibuat);
        $this->db->bind(':deadline', $task['deadline']);
        $this->db->bind(':status', $task['status']);

        $this->db->execute();

        return $this->db->rowCount() > 0;
    }




    public function updateTask($task)
    {
        $user_id = $_SESSION['user_id']; // Ubah sesuai dengan kunci session yang sesuai

        // Tambahkan logika untuk mengatur tanggal_dibuat menjadi jam sekarang
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_dibuat = date('Y-m-d H:i:s');

        $this->db->query('UPDATE tugas SET user_id = :user_id, nama_tugas = :nama_tugas, deskripsi_tugas = :deskripsi_tugas, tanggal_dibuat = :tanggal_dibuat, deadline = :deadline, status = :status WHERE id = :id');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':nama_tugas', $task['nama_tugas']);
        $this->db->bind(':deskripsi_tugas', $task['deskripsi_tugas']);
        $this->db->bind(':id', $task['id']);
        $this->db->bind(':tanggal_dibuat', $tanggal_dibuat);
        $this->db->bind(':deadline', $task['deadline']);
        $this->db->bind(':status', $task['status']);

        $this->db->execute();

        return $this->db->rowCount() > 0;
    }



    public function deleteTask($id)
    {
        $this->db->query('DELETE FROM tugas WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->execute();

        return $this->db->rowCount() > 0; // Mengembalikan true jika ada baris yang terpengaruh
    }
}
