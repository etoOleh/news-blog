
<div class="section topics">
    <h2 class="section-title">Группы</h2>
    <ul>
        <?php

        //этот блок кода был вынесен сюда для облегчения


        $sql = "SELECT * FROM tbl_category";
        $query = $conn->select($sql);
        $query->execute();
        while($fetch = $query->fetch()){
            ?>
            <li><a href="index.php?id=<?php echo $fetch['id'];?>"><?php echo $fetch['name']?></a></li>
        <?php } ?>
    </ul>
</div>
