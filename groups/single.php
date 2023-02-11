<?php include("../path.php"); //подключение файлов ?>
<?php include("../config/config.php");?>
<?php include("../app/lib/Database.php");?>
<?php include("../app/helpers/Format.php");?>
<?php session_start();  //запуск сесси для логин  ?>
<?php
    //создал 2 обьекта и получил айди страницы
    $db = new Database();
    $conn = new Database();
    $fm = new Format();
    if(!isset($_GET['id']) || $_GET['id'] == NULL ){
        echo "Error";
    }else{
        $id = $_GET['id'];
    }
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

    <title>Single Post</title>
</head>
<body>
<!-- header -->
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>
<!-- //header -->
<!-- page-wrapper -->
<div class="page-wrapper">



    <div class="content clearfix">

        <div class="main-content-wrapper">
            <div class="main-content single ">
                <?php

                //кусок для вывода постов

                $sql = "select * from tbl_post where id=$id";
                $post = $db->select($sql);
                $post->execute();

                //кусок для вывода групп поста

                $sql2 = "select cat from tbl_post where id=$id";
                $postCat2 = $db->select($sql2);
                $postCat2->execute();
                $fetchCat2 = $postCat2->fetch();

                $idd = $fetchCat2['cat'];

                //кусок для вывода имени поста

                $sql = "select name from tbl_category where id=$idd";
                $postCat = $db->select($sql);
                $postCat->execute();
                $fetchCat = $postCat->fetch();

                //кусок для вывода категории

                $sql33 = "SELECT tbl_tags.name FROM tbl_tags, post_tag WHERE tbl_tags.id = post_tag.tagId and post_tag.postId = $idd;";
                $postCat3 = $db->select($sql33);
                $postCat3->execute();
                $fetchTag = $postCat3->fetch();

                //цикл который выводит посты из базы данных со своей категорией и группами

                while($fetch = $post->fetch()){
                ?>

                <h1 class="post-title"><?php echo $fetch['title']; ?></h1>
                <h4><?php echo $fm->formatDate($fetch['date']); ?>, author: <a href="#"><?php echo $fetch['author']; ?></a></h4>

                <div class="post-content">
                    <?php echo $fetch['body']; ?>
                    <?php echo "Группа: ".   $fetchCat['name'] . "<br>";?>
                    <?php echo "<br>" ."Категории: " . $fetchTag['name'];?>
                    <?php while($fetchTag = $postCat3->fetch()) {
                        echo " " . $fetchTag['name'];
                    }
                    ?>
                    <br>
                    <img src="../admin/upload/<?php echo $fetch['image']; ?>" alt="" class="post-image" height="400px" width="">
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="sidebar single">
            <div class="section topics">
                <ul>
                    <?php //кусоск для вывода списка групп
                    $sql = "SELECT * FROM tbl_category";
                    $query = $conn->select($sql);
                    $query->execute();
                    while($fetch = $query->fetch()){
                        ?>
                        <li><a href="index.php?id=<?php echo $fetch['id'];?>"><?php echo $fetch['name']?></a></li>
                    <?php } ?>
                </ul>
            </div>

            <div class="section topics">
                <h2 class="section-title">Категории</h2>
                <ul>
                    <?php //кусоск для вывода списка категорий
                    $sql = "SELECT * FROM tbl_tags";
                    $query = $conn->select($sql);
                    $query->execute();
                    while($fetch = $query->fetch()){
                        ?>
                        <li><a href="categories/index.php?id=<?php echo $fetch['id'];?>"><?php echo $fetch['name']?></a></li>
                    <?php } ?>
                </ul>
            </div>
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


