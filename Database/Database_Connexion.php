<?php

namespace Database;

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv as Dotenv;
use PDO;
use PDOException;
use Exception;

class Database
{
    public $host;
    public $dbname;
    public $username;
    public $password;
    public $port;
    public $conn;

    public function __construct()
{
    $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
    $dotenv->load();

    $this->host = $_ENV['DB_HOST'];
    $this->dbname =  $_ENV['DB_NAME']; 
    $this->username = $_ENV['DB_USERNAME'];
    $this->password = $_ENV['DB_PASSWORD'];
    $this->port =  $_ENV['DB_PORT'];
}


public function connect(){
    try {
        $this->conn = new PDO(
            'mysql:host=' . $this->host . ';dbname=' . $this->dbname . ';port=' . $this->port,
            $this->username,
            $this->password
        );
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        throw new Exception("Erreur de connexion à la base de donnée: ");
    }
}
    public function query($sql){
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            var_dump($stmt);

    }catch (\Throwable $e) {
        throw new Exception("". $e->getMessage());
    }

    }
}

$form = new Database();
$form->connect();
$form->query("show tables");