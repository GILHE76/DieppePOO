<?php
/**
 * Created by PhpStorm.
 * User: Dell
 * Date: 26/04/2018
 * Time: 16:55
 */

namespace Tools;


class Querie
{
    private $dsn = "mysql:dbname=easywedding;host=localhost;charset=utf8";
    private $user = "root";
    private $password = "";
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO($this->dsn, $this->user, $this->password);
            $this->db-setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ).

        }
        catch (PDOException $e)
        {
            Log::logwrite($e->getMessage());
        }

    }
    public function selectMethod($sql)
    {

    }

    public function __destruct()
    {
        unset($this->db);
    }


}