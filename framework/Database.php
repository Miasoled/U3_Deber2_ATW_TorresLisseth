<?php
class Database
{
    private $connection;
    private $statement;
    
    public function __construct()
    {
        $host = 'localhost'; 
        $port = '3306';
        $dbname = 'lab1_ATW_TL';
        $user = 'root';
        $password = '';

        $dsn = "mysql:host={$host};port={$port};dbname={$dbname};charset=utf8mb4";
        $this->connection = new PDO($dsn, $user, $password);
        
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }
    
    public function query($sql, $params = [])
    {
        $this->statement = $this->connection->prepare($sql);
        $this->statement->execute($params);
        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function firstOrFail()
    {
        $result = $this->statement->fetch(PDO::FETCH_ASSOC);
        if ($result === false) {
            exit('404 Not Found');
        }
        return $result;
    }

    public function first()
    {
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }
}