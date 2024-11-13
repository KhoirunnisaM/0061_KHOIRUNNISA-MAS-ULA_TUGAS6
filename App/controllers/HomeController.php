<?php
    class HomeController
    {
        private $db;

        public function __construct($db)
        {
            $this->db = $db;
        }

        public function index()
        {
            require __DIR__ . '/../views/home/index.php'; 
        }
    }
