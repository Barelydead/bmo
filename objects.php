<?php
$active = "objects";
include "include/header.php";


$kategori = isset($_GET['category']) ? $_GET['category'] : null;
$categoryID = fetchIdBasedOnCategory($kategori);

$objectID = isset($_GET['id']) ? $_GET['id'] : $categoryID[0]['id'];
$objectImgSrc = fetchImageSrcBasedOnCategory($kategori);

$res = fetchFullObject($objectID, $kategori);
$objectTitle = fetchObjectTitle();


#counter for previous next funk
$prev = $objectID - 1;
$next = $objectID + 1;

if ($next >= (intval($categoryID[0]['id']) + intval(count($categoryID)))) {
    $next = intval($categoryID[0]['id']) + intval(count($categoryID)) - 1 ;
}

if ($prev < $categoryID[0]['id']) {
    $prev = $categoryID[0]['id'];
}


?>

<div class="main-wrap">

<div class="left-div">


</div>





        <div class="right-div">

                <a href="objects.php?id=<?php echo $prev; ?>&category=<?php echo $kategori; ?>" class="author">Föregående</a>
                <a href="objects.php?id=<?php echo $next; ?>&category=<?php echo $kategori; ?>" class="pubdate">Nästa</a>
                <hr><br>


            <div class="object-pic-div">
                <?php echo "<a href='img/full-size/" . $res[0]["image"] . "'><img src='img/550x550/" . $res[0]["image"] . "' alt='stor bild' class='object-pic'></a><br>"; ?>
            </div>

            <div class="object-info-div left">
                <?php echo "<h2 class='object-h2'>" . $res[0]["title"] . "</h2>"; ?>
                <p><strong>Kategori:</strong></P>
                    <p><?php echo $res[0]["category"]; ?></p>
                    <p><strong>Info:</strong></p>
                    <p><?php echo $res[0]["text"]; ?></p>
                    <p><strong>Ägare:</strong></p>
                    <p><?php echo $res[0]["owner"]; ?></p>
                </div>




                <div class="thumb-div">
                    <br>
                    <hr>
                    <form>
                        <p>Visa:
                        <select name="category" onchange="this.form.submit();">
                            <option value="" <?php echo ($kategori == "" ? "selected" : "")?>>Alla objekt</option>
                            <option value="Begravningskonfekt" <?php echo ($kategori == "Begravningskonfekt" ? "selected" : "")?>>Begravningskonfekt</option>
                            <option value="Inbjudningsbrev" <?php echo ($kategori == "Inbjudningsbrev" ? "selected" : "")?>>Inbjudningsbrev</option>
                            <option value="Pärlkrans" <?php echo ($kategori == "Pärlkrans" ? "selected" : "")?>>Pärlkransar</option>
                            <option value="Minnestavla" <?php echo ($kategori == "Minnestavla" ? "selected" : "")?>>Minnestavla</option>
                            <option value="Begravningsfest" <?php echo ($kategori == "Begravningsfest" ? "selected" : "")?>>Begravningsfest</option>
                            <option value="Begravningstal" <?php echo ($kategori == "Begravningstal" ? "selected" : "")?>>Begravningstal</option>
                            <option value="Begravningssked" <?php echo ($kategori == "Begravningssked" ? "selected" : "")?>>Begravningssked</option>
                        </select></p>
                    </form>

                    <?php
                    foreach ($objectImgSrc as $key => $array) {
                            echo '<a href="objects.php?id=' . $array['id'] . '&category=' .  $kategori . '" class="thumb"><div class=thumb-holder><img src="img/80x80/' . $array['image'] . '" alt="Thumbnail"></div></a>';
                    }
                    ?>

                </div>
            </div>
</div>



<?php include "include/footer.php"; ?>
