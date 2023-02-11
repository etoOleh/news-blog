<?php include("../path.php"); // Подключил все файлы для работы ?>
<?php include("../config/config.php");?>
<?php include("../app/lib/Database.php");?>
<?php include("../app/helpers/Format.php");?>
<?php session_start(); // Начал сессию для логина ?>
<?php // создали 2 обьекта и считал айди статьи
    $conn = new Database();
    $fm = new Format();

    if(!isset($_GET['id']) || $_GET['id'] == NULL ){
        echo "Error";
    }else{
        $id = $_GET['id'];
    }
?>


<?php // блок кода в котором я указал максимально допустимое число постов на 1 страницу (в данном случае 5)
    $per_page =5;
    if (isset($_GET["page"])){
        $page = $_GET["page"];
    }else{
        $page = 1;
    }
    $start_form = ($page-1) * $per_page;
?>

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
    <link rel="stylesheet" href="../assets/css/style.css">

    <title>Groups</title>
</head>
<body>
<!-- header -->
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>
<!-- //header -->

<!-- page-wrapper -->
<div class="page-wrapper">

    <div class="content clearfix">

        <div class="main-content">

            <?php

            // блок кода который выводит имя категории по айди из поиска
            $id = $_GET['id'];
            $sql2 = "SELECT name FROM tbl_category where id=$id";
            $query2 = $conn->select($sql2);
            $query2->execute();
            $fetchCat = $query2->fetch();
            ?>

            <h1 class="recent-post-title">Group - <?php echo $fetchCat['name']; ?> </h1>

            <?php

            // блок кода который выводит все посты указанной категории

            $id = $_GET['id'];

            $sql = "SELECT * FROM tbl_post where cat=$id limit $start_form, $per_page";
            $query = $conn->select($sql);
            $query->execute();

            while($fetch = $query->fetch()){
                ?>

                <div class="post clearfix">
                    <img src="../admin/upload/<?php echo $fetch['image']; ?>" alt="" class="post-image">
                    <div class="post-preview">
                        <h2><a href="single.php"><?php echo $fetch['title']; ?></a></h2>
                        <i class="far fa-user">Author: <?php echo $fetch['author']; ?></i>
                        &nbsp;
                        <i class="far calendar"><?php echo $fm->formatDate($fetch['date']); ?></i>
                        <p class="preview-text">
                            <?php echo $fm->textShorten($fetch['body'],200); ?>
                        </p>
                        <a href="single.php?id=<?php echo $fetch['id']; ?>" class="btn read-more">Read more</a>
                    </div>
                </div>
            <?php } ?>

            <?php


            //блок кода индетичный прошлому для отображения постраничной навигации

            $sql2 = "SELECT count(id) FROM tbl_post where cat=$id";
            $query2 = $conn->select($sql2);
            $query2->execute();
            $row_count2 =$query2->fetchColumn();



            $total_pages = ceil($row_count2/$per_page);
            $total_pages = $total_pages;

            echo "<span class='pagination'><a href='index.php?id=$id&page=1'>" . 'First Page'. "</a>"?>
            <?php
            for($i=2;$i < $total_pages;$i++){
                echo "<a href='index.php?id=$id&page=". $i."'>". $i."</a>";
            }

            echo "<a href='index.php?id=$id&page=$total_pages'>".'Last Page'."</a></span>"?>

        </div>

        <div class="sidebar">

            <div class="section search">

            </div>

            <?php include("cat.php"); //подкл группы из файла ?>

        </div>
    </div>
    <!-- //content -->
</div>
<!-- //wrapper -->

<!-- footer -->
<?php include(ROOT_PATH . "/app/includes/footer.php"); ?>


<!--  jQuery  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!--Slick-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<!-- Свой JS-->
<script src="assets/js/script.js"></script>

</body>
</html>



