<?php

class Usuario {

    //query
    private $sql = '';
    // Connection instance
    private $connection;
    // table name
    private $table_name = "usuarios";
    // table columns
    public $usuIdUsuario;
    public $usuLogin;
    public $domIdDominio;
    public $usuNome;
    public $usuEmail;
    public $usuCorporativo;
    public $carIdCargo;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    //C
    public function create() {

        $stmt = $this->connection->prepare('INSERT INTO usuarios (usuLogin, domIdDominio, usuNome, usuEmail, usuCorporativo, carIdCargo) '
                . 'VALUES(:login, :dominio_id, :nome, :email, :corporativo, :cargo)');
        $exec = $stmt->execute(array(
            ':login' => $this->usuLogin,
            ':dominio_id' => $this->domIdDominio,
            ':nome' => $this->usuNome,
            ':email' => $this->usuEmail,
            ':corporativo' => $this->usuCorporativo,
            ':cargo' => $this->carIdCargo
        ));

        return $exec;
    }

    //R
    public function read() {
        $this->sql = "select * from usuarios;";
        return $this->connection->query($this->sql);
    }

    public function readOne() {

        // query to read single record
        $query = "SELECT
                c.name as category_name, p.id, p.name, p.description, p.price, p.category_id, p.created
            FROM
                " . $this->table_name . " p
                LEFT JOIN
                    categories c
                        ON p.category_id = c.id
            WHERE
                p.id = ?
            LIMIT
                0,1";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);

        // execute query
        $stmt->execute();

        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        $this->name = $row['name'];
        $this->price = $row['price'];
        $this->description = $row['description'];
        $this->category_id = $row['category_id'];
        $this->category_name = $row['category_name'];
    }

    public function update() {

        // update query
        $query = "UPDATE
                " . $this->table_name . "
            SET
                name = :name,
                price = :price,
                description = :description,
                category_id = :category_id
            WHERE
                id = :id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->category_id = htmlspecialchars(strip_tags($this->category_id));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind new values
        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':category_id', $this->category_id);
        $stmt->bindParam(':id', $this->id);

        // execute the query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete() {

        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

        // prepare query
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind id of record to delete
        $stmt->bindParam(1, $this->id);

        // execute query
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

}
