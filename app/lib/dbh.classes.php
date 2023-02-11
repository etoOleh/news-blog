<?php
//
// Класс для базы данных (я его сделал исключительно для работы с логином)
// по не понятным мне причинам старый я не понял как реализовать в логине поэтому создал новый с подлючением таким же как и старый
Class Dbh{

    public $host = DB_HOST;
    public $user= DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;

    protected function connect(){ // функция для подклчюения баззы данных
        try{
            $dbh = new PDO("mysql:host=$this->host;dbname=$this->dbname", "$this->user", "$this->pass");
            return $dbh;
        }
        catch(PDOException $e){
            print  "error: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
