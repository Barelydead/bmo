<?php
$active = "home";
include "include/header.php";
$res = fetchAll("SELECT * FROM Article WHERE (category = 'home')");
?>


<div class="main-wrap">

    <div class="left-div">
    </div>

    <div class="right-div">

            <h1 class="start-headline"><?php echo $res[0]['title']; ?></h1>


            <?php echo $res[0]['content']; ?><br><br>
            <img src="img/maggy/likvagn_med_hast.jpg" alt="likvagn med häst">

    </div>

</div>


<?php include "include/footer.php"; ?>
