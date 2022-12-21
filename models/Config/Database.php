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

    /**
     * Function specifically for INSERT, UPDATE or DELETE queries.
     * Checks the count of affected rows from the operation, or
     * returns the insert ID.
     * 
     * @param string $query
     * @param array $params = []
     * @param bool $returnItem = false => This parameter specifies
     * whether the insert ID or rowCount is returned. By default, the
     * rowCount is returned.
     * 
     * @return int
     * 
     */
    public function upsert($query, $params = [], bool $returnItem = false): int
    {
        $this->query($query, $params);
        return $returnItem ? $this->conn->lastInsertId() : $this->stmt->rowCount();
    }
}
