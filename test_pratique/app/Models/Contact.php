<?php

namespace App\Models;

use App\Database\Database;
use PDO;

class Contact
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function saveMessage(string $name, string $email, string $message): bool
    {
        $sql = "INSERT INTO contacts (name, email, message, created_at) VALUES (:name, :email, :message, NOW())";
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':message' => $message
        ]);
    }
} 