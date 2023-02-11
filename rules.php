<?php include("path.php"); // Подключил все файлы для работы?>
<?php include("config/config.php");?>
<?php include("app/lib/Database.php");?>
<?php include("app/helpers/Format.php");?>
<?php session_start(); // Начал сессию для логина?>
<?php // создали 2 обьекта и считал айди статьи
    $conn = new Database();
    $fm = new Format();
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
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Rules</title>
</head>
<body>
<!-- header -->
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>
<?php //include(ROOT_PATH . "/app/includes/messages.php"); ?>
<!-- //header -->

<!-- page-wrapper -->

<div class="page-wrapper">

    <div class="content clearfix">

        <div class="main-content">

            <div class="main-content">
                <h1 class="recent-post-title">Rules</h1>


                <div class="post clearfix">

                    <p>Мы – ведущее информационное агентство в России. Родились 1 февраля 2023 года </p>
                </div>

                <div class="post clearfix">

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet doloribus eius sint.</p>
                </div>

                <div class="post clearfix">

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet doloribus eius sint.</p>
                </div>

            </div>
        </div>

        <div class="sidebar">

            <div class="section search">

            </div>

            <?php include("app/includes/cat.php"); //кусоск для вывода списка группа?>

            <div class="section topics">
                <h2 class="section-title">Категории</h2>
                <ul>
                    <?php //кусоск для вывода списка категории
                    $sql = "SELECT * FROM tbl_tags";
                    $query = $conn->select($sql);
                    $query->execute();
                    while($fetch = $query->fetch()){
                        ?>
                        <li><a href="groups/categories/index.php?id=<?php echo $fetch['id'];?>"><?php echo $fetch['name']?></a></li>
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


