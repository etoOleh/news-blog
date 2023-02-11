<?php

    //файл отключения сесси - нужен для разлогинивая пользователей

    session_start();
    session_unset();
    session_destroy();

    header("Location: index.php?error=none");