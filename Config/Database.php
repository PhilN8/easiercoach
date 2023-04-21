<?php

namespace Config;

use PDO, PDOException;
use PDOStatement;

class Database
{
    private ?PDO $conn;
    private ?PDOStatement $stmt;

    public function __construct($config, $username = 'root', $password = '')
    {
        $this->conn = null;
        $dsn = 'mysql:' . http_build_query($config, '', ';');

        try {
            $this->conn = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_FOUND_ROWS => true
            ]);
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
            exit();
        }
    }

    /**
     * Executes a query with the given parameters
     * 
     * @param $query
     * @param $params = []
     * 
     * @return $this => current instance of this object
     * 
     */
    public function query($query, $params = [])
    {
        $this->stmt = $this->conn->prepare($query);
        $this->stmt->execute($params);

        return $this;
    }

    public function all()
    {
        return $this->stmt->fetchAll();
    }

    public function find()
    {
        return $this->stmt->fetch();
    }

    public function check(): bool
    {
        $result = $this->find();

        return $result === FALSE ? false : true;
    }

    public function upsert($query, $params = []): int
    {
        $this->query($query, $params);
        return $this->stmt->rowCount();
    }

    public function insertWithID($query, $params)
    {
        $this->query($query, $params);
        return $this->conn->lastInsertId();
    }
}
