<?php

namespace App\Database\migrations;
use App\Database\Database;
use PDOException;
require 'vendor/autoload.php';
try {
    $db = Database::getInstance()->getConnection();
    
    $sql = "CREATE TABLE IF NOT EXISTS contacts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        message TEXT NOT NULL,
        created_at DATETIME NOT NULL
    )";
    
    $db->exec($sql);
    echo "Table 'contacts' créée avec succès.\n";
} catch (PDOException $e) {
    echo "Erreur lors de la création de la table : " . $e->getMessage() . "\n";
} 