<?php include("path.php"); // Подключил все файлы для работы ?>
<?php include("config/config.php");?>
<?php include("app/lib/Database.php");?>
<?php include("app/helpers/Format.php");?>
<?php include("login.inc.php"); // Начал сессию для логина ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- FontAwesom -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css"/>

    <!-- Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">

    <!-- Свои файлы -->
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Login</title>
</head>
<body>
<!-- header -->

<?php include(ROOT_PATH . "/app/includes/header.php"); ?>

<!-- //header -->

<div class="auth-content">


<!--    --><?php
//
//    if($_SERVER['REQUEST_METHOD']=='POST'){
//        $username = $fm->validation($_POST['username']);
//        $password = $fm->validation(md5($_POST['password']));
//
//        $query = "select * from tbl_user where username = $username and password = $password";
//        $result = $db-> select($query);
//
//        if($result!=false){
//            $value = $result->fetch(PDO::FETCH_BOTH);
//            $count = $result->rowCount();
//
//            if($count > 0){
//                Session::set("login",true);
//                Session::set("username",$value['username']);
//                Session::set("userId",$value['id']);
//                header("Location: index.php");
//            }else{
//                echo "<span style ='color:red; font-size:18px;'>username or pas not found</span>";
//            }
//        }else{
//            echo "<span style ='color:red; font-size:18px;'>username or pas not matched</span>";
//        }
//
//
////        $query = $result->execute();
////
////        $count = $result->rowCount();
////        if($count > 0){
////            Session::set("login",true);
////            Session::set("username",$query['username']);
////            Session::set("userId",$query['id']);
////            header("Location: index.php");
////        }else{
////            echo "<span style ='color:red; font-size:18px;'>username or pas not found</span>";
////        }
//
//    }
//
//    ?>



    <form action="login.php" method="post">

<!--        --><?php //include(ROOT_PATH . "/app/helpers/formErrors.php");  ?>
<!--        value="--><?php //echo $username; ?><!--"-->
        <h2 class="form-title">Login</h2>
        <div>
            <label>Username</label>
            <input type="text" name="username"  class="text-input">
        </div>
        <div>
            <label>Password</label>
            <input type="text" name="password"  class="text-input">
        </div>
        <div>
            <button type="submit" name="login-btn" class="btn btn-big">Login</button>
        </div>
<!--        <p>Or <a href="--><?php //echo BASE_URL . '/register.php' ?><!--">Sign Up</a></p>-->
    </form>
</div>

<!--  jQuery  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Свой JS-->
<script src="assets/js/script.js"></script>

</body>
</html>
