<?php

namespace SRC;
use \PDO;

class DB
{
    protected $db;
    protected $statement;

    public function __construct( $server, $database, $user, $password)
    {
        $this->db = new PDO(
            "mysql:dbname=$database;host=$server;",
            $user,$password
        );
    }
    
    public function getAll($query, $data = [])
    {
        return $this->query($query, $data)->fetchAll( PDO::FETCH_OBJ );
    }

    public function getOne($query, $data = [])
    {
        return $this->query($query, $data)->fetch( PDO::FETCH_OBJ );
    }

    public function setOne($query, $data = [])
    {
        return $this->query($query,$data);
    }

    public function query($query,$data = [])
    {
        $this->statement = $this->db->prepare($query);
        $this->statement->execute($data);

        return $this->statement;
    }
}