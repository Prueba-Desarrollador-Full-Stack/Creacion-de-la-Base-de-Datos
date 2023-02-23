<?php
  class Conexion extends PDO
  {
    protected $connection = null;
    public function __construct()
    {
        try {
            $this->connection = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE_NAME, DB_USERNAME, DB_PASSWORD);;
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Could not connect to database: " . $e->getMessage());
        }			
    }
    public function select($query = "" , $params = [])
    {
        try {
            $stmt = $this->executeStatement($query, $params);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
            return $result;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }
        return false;
    }
    private function executeStatement($query = "" , $params = [])
    {
        try {
            $stmt = $this->connection->prepare($query);
            if ($params) {
                foreach ($params as $key => $value) {
                    $stmt->bindValue($key+1, $value);
                }
            }
            $stmt->execute();
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception($e->getMessage());
        }	
    }
  }
?>