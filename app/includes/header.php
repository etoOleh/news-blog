<header>
    <a href="<?php echo BASE_URL . '/index.php' ?>" class="logo">
        <h1 class="logo-text"><span>My</span> Blog</h1>
    </a>

    <i class="fa fa-bars menu-toggle"></i>
    <ul class="nav">
        <li>
            <a href=" <?php echo BASE_URL . '/index.php' ?>">Новости</a>
            <ul style="left:0px;">
                <li><a href="<?php echo BASE_URL . '/index.php' ?>">Новости</a></li>
                <li><a href="<?php echo BASE_URL . '/groups/index.php?id=1' ?>">Группы</a></li>
                <li><a href="<?php echo BASE_URL . '/groups/categories/index.php?id=1' ?>">Категории</a></li>
            </ul>
        </li>
        <li><a href=" <?php echo BASE_URL . '/about.php' ?>">О нас</a></li>
        <li><a href=" <?php echo BASE_URL . '/rules.php' ?>">Правила</a></li>
        <?php
                // вывел отдельно хедер и футер для простоты

        //блок кода который выставляет значения пльзоатея при авторизации

            if (isset($_SESSION["userid"]))
            {
        ?>
            <li><a href="#"><?php echo $_SESSION['useruid']; ?></a></li>
            <li><a href="<?php echo BASE_URL . '/logout.inc.php' ?>">log out</a></li>
        <?php
            }
            else
            {
        ?>
            <li><a href="<?php echo BASE_URL . '/login.php' ?>">Войти</a></li>
        <?php
            }
        ?>
    </ul>
</header>
