<?php

namespace App\Model\conexDB;

use mysqli;

class ConexDB
{
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $dataBase = 'inventario_db';
    private $conex = null;

    public function __construct()
    {
        $this->conex = new mysqli(
            $this->host,
            $this->user,
            $this->password,
            $this->dataBase
        );
    }

    public function closeDB()
    {
        $this->conex->close();
    }

    public function exeSQL($sql)
    {
        return $this->conex->query($sql);
    }
    public function lastInsertId()
    {
        return $this->conex->insert_id;
    }
}
