<?php 
        namespace Model;
        require_once __DIR__ . '/../vendor/autoload.php';
        
        class Coco extends Database {
            protected $db;

            public function __construct()
            {
                $this->db = new Database();
            }
        }