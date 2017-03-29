<?php
$active = "about";
include "include/header.php";


$res = fetchAbout();
?>


<div class="main-wrap">

    <div class="left-div">
    </div>

            <div class="right-div">

                            <h1 class="start-headline"><?php echo $res[0]['title']; ?></h1>


                            <?php echo $res[0]['content']; ?>
                            <br>
            <p>Credits:
            <div>Icons made by <a href="http://www.flaticon.com/authors/eucalyp" title="Eucalyp">Eucalyp</a> from <a href="http://www.flaticon.com" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>

            </div>

        </div>


<?php include "include/footer.php"; ?>
