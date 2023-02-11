<?php

//
// Класс для базы данных
//
    Class Database{
        public $host = DB_HOST;
        public $user= DB_USER;
        public $pass = DB_PASS;
        public $dbname = DB_NAME;

        public $link;
        public $error;

        public function __construct() // конструктор класса
        {
            $this -> connectDB();
        }

        protected function connectDB(){ // функция подключения к базе данных с помощбю PDO
            $this->link = new PDO("mysql:host=$this->host;dbname=$this->dbname", "$this->user", "$this->pass");
            if (!$this->link){
                $this->error = "Connection fail:" . $this->$link -> connect_error;
            }
        }

        public function select($query){ // функция вывода указанных значений из класса
            return $this->link->prepare($query);
        }

    }
