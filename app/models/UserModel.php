<?php

class UserModel
{
    private $username;
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUserById($userId)
    {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $userId);
        return $this->db->single();
    }


    // public function getUsername()
    // {
    //     return $this->username;
    // }

    // public function getUserByEmail($email)
    // {
    //     $this->db->query('SELECT * FROM users WHERE email = :email');
    //     $this->db->bind(':email', $email);
    //     return $this->db->single();
    // }

    public function register($username, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $this->db->query("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $this->db->bind(':username', $username);
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $hashedPassword);
        $this->db->execute();
    }
}
