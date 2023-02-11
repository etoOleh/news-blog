<?php include("path.php"); // Подключил все файлы для работы ?>
<?php include("config/config.php");?>
<?php include("app/lib/Database.php");?>
<?php include("app/helpers/Format.php");?>
<?php session_start(); // Начал сессию для логина ?>
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

    <link rel="stylesheet" href="assets/css/table.css">

    <title>About</title>
</head>
<body>
<!-- header -->
<?php include(ROOT_PATH . "/app/includes/header.php"); ?>
<?php //include(ROOT_PATH . "/app/includes/messages.php"); ?>
<!-- //header -->
<br>
<br>
<br>
<h1 style="text-align: center">About</h1>
<br>
<br>
<p style="text-align: center" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi culpa et illo repellat repellendus voluptates voluptatibus? Delectus, impedit ipsum praesentium provident qui quibusdam quidem quis quos similique soluta vero.</p>
<p style="text-align: center" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi culpa et illo repellat repellendus voluptates voluptatibus? Delectus, impedit ipsum praesentium provident qui quibusdam quidem quis quos similique soluta vero.</p>
<p style="text-align: center" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi culpa et illo repellat repellendus voluptates voluptatibus? Delectus, impedit ipsum praesentium provident qui quibusdam quidem quis quos similique soluta vero.</p>
<p style="text-align: center" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi culpa et illo repellat repellendus voluptates voluptatibus? Delectus, impedit ipsum praesentium provident qui quibusdam quidem quis quos similique soluta vero.</p>
<p style="text-align: center" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi culpa et illo repellat repellendus voluptates voluptatibus? Delectus, impedit ipsum praesentium provident qui quibusdam quidem quis quos similique soluta vero.</p>
<p style="text-align: center" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi culpa et illo repellat repellendus voluptates voluptatibus? Delectus, impedit ipsum praesentium provident qui quibusdam quidem quis quos similique soluta vero.</p>
<br>
<br>
<br><p style="text-align: center" > Блок Категории содержит 12 категорий (Он состоит из статей и по категориям и служит для помощи читателю в их вопросе)</p>
<br><p style="text-align: center" > Блок Групы содержит 12 групп (Он разделяет новости на группы пользователей чтобы ничего лишнего не попало читателю)</p>
<div class="box600">
<?php

    // добавил тестовый текст и таблицу для отображения постов по различным категориям и группам

    // сначало идет блок кода который выдает список групп

    $sql = "SELECT * FROM tbl_category";
    $query = $conn->select($sql);
    $query->execute();

    // потом идет блок кода который выдает список с колличеством постов

    $sql2 = "SELECT COUNT(*) as con FROM tbl_post GROUP BY cat";
    $query2 = $conn->select($sql2);
    $query2->execute();

    $sqlCat = "SELECT * FROM tbl_category";
    $queryCateg = $conn->select($sqlCat);
    $queryCateg->execute();

    //цикл который все это вместе соединяет


    echo "<table class='smalltable floatleft'><thead><tr>";

    while($fetch = $query->fetch()){
        $countCat = $query2->fetch();
        $fetchCateg = $queryCateg->fetch();
        echo "<tr>";
        echo '<td><a href="groups/index.php?id=1">' . $fetch["name"] . "</td>";
        echo "<td>" . $countCat["con"] . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";

    // блок кода который выдает список категорий

    $sql = "SELECT * FROM tbl_tags";
    $query = $conn->select($sql);
    $query->execute();

    // блок кода который выдает список с колличеством постов

    $sql2 = "SELECT COUNT(*) as tagss FROM post_tag GROUP BY tagId";
    $query2 = $conn->select($sql2);
    $query2->execute();

    //цикл который все это вместе соединяет

    echo "<table class='smalltable floatleft'><thead><tr>";

    while($fetch = $query->fetch()){
        $countCat = $query2->fetch();
        echo "<tr>";
        echo "<td>" . $fetch["name"] . "</td>";
        echo "<td>" . $countCat["tagss"] . "</td>";
        echo "</tr>";
    }
    echo "</tbody></table>";

?>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br><br>
<br>

<p style="text-align: center" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi culpa et illo repellat repellendus voluptates voluptatibus? Delectus, impedit ipsum praesentium provident qui quibusdam quidem quis quos similique soluta vero.</p>
<p style="text-align: center" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi culpa et illo repellat repellendus voluptates voluptatibus? Delectus, impedit ipsum praesentium provident qui quibusdam quidem quis quos similique soluta vero.</p>
<p style="text-align: center" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi culpa et illo repellat repellendus voluptates voluptatibus? Delectus, impedit ipsum praesentium provident qui quibusdam quidem quis quos similique soluta vero.</p>
<p style="text-align: center" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi culpa et illo repellat repellendus voluptates voluptatibus? Delectus, impedit ipsum praesentium provident qui quibusdam quidem quis quos similique soluta vero.</p>
<p style="text-align: center" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi culpa et illo repellat repellendus voluptates voluptatibus? Delectus, impedit ipsum praesentium provident qui quibusdam quidem quis quos similique soluta vero.</p>
<p style="text-align: center" >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi commodi culpa et illo repellat repellendus voluptates voluptatibus? Delectus, impedit ipsum praesentium provident qui quibusdam quidem quis quos similique soluta vero.</p>
<br>
<br>

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


