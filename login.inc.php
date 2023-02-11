<?php

if(isset($_POST["login-btn"])){

    //захват данных
    $uid = $_POST['username'];
    $pwd = $_POST['password'];

    // инициализация SingContr class
    include "app/lib/dbh.classes.php";
    include "app/lib/login.classes.php";
    include "app/lib/login-contr.classes.php";
    $login = new LoginContr($uid,$pwd);

    //Ошибки и процесс регистрации
    $login->loginUser();

    //Возрват на страницу
    header("Location: index.php?error=none");

}