<?php

ini_set('memory_limit', '-1');

class DBClass {

    private $host = "147.2.10.10";
    private $username = "user_ssp";
    private $password = "ssppass";
    private $database = "sspdb";
    public $connection;

    // get the database connection
    public function getConnection() {

        $this->connection = null;

        try {
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
            $this->connection->exec("set names utf8");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
        }

        return $this->connection;
    }

}
