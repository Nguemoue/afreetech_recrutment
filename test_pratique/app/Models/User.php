<?php

declare(strict_types=1);

namespace App\Models;

use App\Database\Database;
use PDO;

class User
{
    private PDO $db;
    private string $table = 'users';

    public function __construct(
        public ?int $id = null,
        public string $name = '',
        public string $email = '',
        public string $password = '',
        public ?string $created_at = null
    ) {
        $this->db = Database::getInstance()->getConnection();
    }

    public function create(): bool
    {
        try {
            $sql = "INSERT INTO {$this->table} (name, email, password, created_at) 
                    VALUES (:name, :email, :password, NOW())";
            
            $stmt = $this->db->prepare($sql);
            
            return $stmt->execute([
                ':name' => $this->name,
                ':email' => $this->email,
                ':password' => password_hash($this->password, PASSWORD_DEFAULT)
            ]);
        } catch (\PDOException $e) {
            error_log("Erreur lors de la création de l'utilisateur : " . $e->getMessage());
            return false;
        }
    }

    public function update(): bool
    {
        try {
            $sql = "UPDATE {$this->table} 
                    SET name = :name, 
                        email = :email, 
                        password = :password 
                    WHERE id = :id";
            
            $stmt = $this->db->prepare($sql);
            
            return $stmt->execute([
                ':id' => $this->id,
                ':name' => $this->name,
                ':email' => $this->email,
                ':password' => password_hash($this->password, PASSWORD_DEFAULT)
            ]);
        } catch (\PDOException $e) {
            error_log("Erreur lors de la mise à jour de l'utilisateur : " . $e->getMessage());
            return false;
        }
    }

    public function delete(): bool
    {
        try {
            $sql = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([':id' => $this->id]);
        } catch (\PDOException $e) {
            error_log("Erreur lors de la suppression de l'utilisateur : " . $e->getMessage());
            return false;
        }
    }

    public static function findById(int $id): ?self
    {
        try {
            $db = Database::getInstance()->getConnection();
            $sql = "SELECT * FROM users WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute([':id' => $id]);
            
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$data) {
                return null;
            }

            return new self(
                id: $data['id'],
                name: $data['name'],
                email: $data['email'],
                password: $data['password'],
                created_at: $data['created_at']
            );
        } catch (\PDOException $e) {
            error_log("Erreur lors de la recherche de l'utilisateur : " . $e->getMessage());
            return null;
        }
    }

    

    public static function all(): array
    {
        try {
            $db = Database::getInstance()->getConnection();
            $sql = "SELECT * FROM users ORDER BY created_at DESC";
            $stmt = $db->query($sql);
            
            $users = [];
            while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $users[] = new self(
                    id: $data['id'],
                    name: $data['name'],
                    email: $data['email'],
                    password: $data['password'],
                    created_at: $data['created_at']
                );
            }
            
            return $users;
        } catch (\PDOException $e) {
            error_log("Erreur lors de la récupération des utilisateurs : " . $e->getMessage());
            return [];
        }
    }
}