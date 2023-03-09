<?php

namespace Core;

use PDO;
use Core\Response;

class Database
{
    private $connection;
    private $statement;

    public function __construct($config)
    {
        $dsn = 'mysql: ' . http_build_query($config, '', ';');
        $this->connection = new PDO($dsn, 'root', '123123', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();
        if (!$result) {
            abort(Response::NOT_FOUND);
        }
        return $result;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }
}
