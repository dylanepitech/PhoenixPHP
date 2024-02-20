<?php
namespace Model;
require_once __DIR__ . '../../vendor/autoload.php';


class User_model extends Database
{
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }
}  

$d = new User_model();