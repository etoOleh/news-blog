<?php
//
// Класс логин наследуемый класс созданной базы данных
//
Class Login extends Dbh {

    protected  function getUser($uid,$pwd){ // клас полученяи пользователя и всевоможные првоерки
        $stmt = $this->connect()->prepare('SELECT * from tbl_user where username = ? and password = ?');

        if(!$stmt->execute(array($uid,$pwd))){ //проверка на правильность введенных данных
            $stmt = null;
            header("location: index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount() == 0){ // есть ли пользователь в бд
            $stmt = null;
            header("location: index.php?error=usernotfound");
            exit();
        }

        $user = $stmt->fetchAll(PDO::FETCH_ASSOC); // если все ок, помещение в переменную user ассоциативного массива с данными

        session_start();

        $_SESSION["userid"] = $user[0]["id"];
        $_SESSION["useruid"] = $user[0]["username"];

        $stmt = null;

    }

}

