<?php

// классс логин контроллер сделанынй для работы с логином наследуемый от класса родителя логин

Class LoginContr extends Login {
    private $uid;
    private $pwd;

    public function __construct($uid,$pwd){ //конструктор
        $this->uid=$uid;
        $this->pwd=$pwd;
    }

    public function loginUser(){ // функция проверки не пустые ли поля
        if ($this->emptyInput() == false){
            header("location: index.php?error=emptyinput");
            exit();
        }

        $this->getUser($this->uid,$this->pwd);
    }

    private function emptyInput(){ // функция для проверки не пустые ли поля
        $result = true;
        if (empty($this->uid) || empty($this->pwd)){
            $result = false;
        }
        return  $result;
    }

}
