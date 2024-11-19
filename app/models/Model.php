<?php
class Model
{
    private $database;
    private $connection;

    public function __construct()
    {
        $this->database = new Database();
        $this->connection = $this->database->connect();

        $this->create_users_table();
        $this->create_bookings_table();
        $this->create_vans_table();
        $this->create_messages_table();
        $this->insert_admin_data();
    }

    private function create_users_table()
    {
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            uuid CHAR(36) NOT NULL UNIQUE,
            name VARCHAR(100) NOT NULL,
            username VARCHAR(50) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            image VARCHAR(255) NOT NULL,
            user_type ENUM('admin', 'customer') NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if (!$this->connection->query($sql) === TRUE) {
            die("Error creating users table: " . $this->connection->error);
        }
    }

    private function create_bookings_table()
    {
        $sql = "CREATE TABLE IF NOT EXISTS bookings (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            uuid CHAR(36) NOT NULL UNIQUE,
            passenger_id INT UNSIGNED NOT NULL,
            van_id INT UNSIGNED NOT NULL,
            trip_date VARCHAR(10) NOT NULL,
            trip_time VARCHAR(7) NOT NULL,
            origin VARCHAR(255) NOT NULL,
            destination VARCHAR(255) NOT NULL,
            fare FLOAT(11,2) NOT NULL,
            status ENUM('pending', 'confirmed', 'cancelled') DEFAULT 'pending',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if (!$this->connection->query($sql) === TRUE) {
            die("Error creating bookings table: " . $this->connection->error);
        }
    }

    private function create_vans_table()
    {
        $sql = "CREATE TABLE IF NOT EXISTS vans (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            uuid CHAR(36) NOT NULL UNIQUE,
            model VARCHAR(100) NOT NULL,
            brand VARCHAR(100) NOT NULL,
            capacity INT NOT NULL,
            image VARCHAR(255) NOT NULL,
            status ENUM('available', 'unavailable') DEFAULT 'available',
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if (!$this->connection->query($sql) === TRUE) {
            die("Error creating vans table: " . $this->connection->error);
        }
    }
    
    private function create_messages_table()
    {
        $sql = "CREATE TABLE IF NOT EXISTS messages (
            id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            uuid CHAR(36) NOT NULL UNIQUE,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            subject VARCHAR(100) NOT NULL,
            message TEXT NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

        if (!$this->connection->query($sql) === TRUE) {
            die("Error creating vans table: " . $this->connection->error);
        }
    }

    private function insert_admin_data()
    {
        $is_admin_exists = $this->database->select_one("users", ["id" => "1"]);

        if (!$is_admin_exists) {
            $data = [
                "uuid" => $this->database->generate_uuid(),
                "name" => 'Administrator',
                "username" => 'admin',
                "password" => password_hash('admin123', PASSWORD_BCRYPT),
                "image" => 'default-user-image.png',
                "user_type" => 'admin',
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
            ];

            $this->database->insert("users", $data);
        }
    }
}
