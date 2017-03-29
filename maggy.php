<?php
$active = "maggy";
include "include/header.php";


$res = fetchMaggy();

$articlestring = $res[0]['content'];
$articleArray = explode("|", $articlestring);
?>


<div class="main-wrap">

    <div class="left-div">
    </div>

            <div class="right-div">

                            <h1 class="start-headline"><?php echo $res[0]['title']; ?></h1>
                            <br><br>


                            <?php echo $articleArray[1]; ?>
                            <?php echo $articleArray[2]; ?>
                            <img class="pic-wide" alt="Picture" src="img/maggy/begravningsfolje.jpg">

                            <?php echo $articleArray[3]; ?>
                            <img class="picture-double" alt="Picture" src="img/maggy/likvagn.jpg">
                            <img class="picture-double" alt="Picture" src="img/maggy/likvagn_med_hast.jpg">

                            <?php echo $articleArray[4]; ?>
                            <img class="picture-double" alt="Picture" src="img/maggy/annons_begravningsbyra.jpg">
                            <img class="picture-double" alt="Picture" src="img/maggy/begravningsbyra_skylt.jpg">

                            <?php echo $articleArray[5]; ?>
                            <img class="pic-standard" alt="Picture" src="img/maggy/minnestavla.jpg">

                            <?php echo $articleArray[6]; ?>
                            <img class="picture-double" alt="Picture" src="img/maggy/parlkrans.jpg">
                            <img class="picture-double" alt="Picture" src="img/maggy/parlkrans_vid_grav.jpg">

                            <?php echo $articleArray[7]; ?>
                            <img class="pic-standard" alt="Picture" src="img/maggy/gravol.jpg">

                            <div class="maggy-container">
                            <img class="picture-float" alt="Picture" src="img/maggy/dodsannonser.jpg">
                            <?php echo $articleArray[8]; ?>
                            </div>

                            <div class="maggy-container">
                            <img class="picture-float" alt="Picture" src="img/maggy/sorgesloja.jpg">
                            <?php echo $articleArray[9]; ?>



                            <span class="author"><?php echo (isset($res[0]["author"]) ? $res[0]["author"] : "okänd"); ?></span>
                    </div>
            </div>
        </div>


<?php include "include/footer.php"; ?>
