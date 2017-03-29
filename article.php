<?php
$active = "article";
include "include/header.php";

$articleID = isset($_GET['id']) ? $_GET['id'] : 1;

$res = fetchFullArticle($articleID);
$articleTitle = fetchArticleTitle();

$category = categoryBasedOnArticle($res[0]["title"]);
$articleIMG = fetchArticleImage($category);


#counter for previous next funk
$prev = $articleID - 1;
$next = $articleID + 1;

if ($next > count($articleTitle)) {
    $next = 1;
}

if ($prev < 1) {
    $prev = count($articleTitle);
}


?>


<div class="main-wrap">
    <div class="left-div">
        <h2>Artiklar:</h2>
        <nav class="left-navbar">
        <ul class="nav-list">
            <?php
            foreach ($articleTitle as $value) {
                echo '<li><a href="article.php?id=' . $value['id'] . '" class="a-left-navbar">' . $value['title'] . '</a></li>';
            }
            ?>
        </ul>
        </nav>
        </div>





                    <div class="right-div">

                            <a href="article.php?id=<?php echo $prev; ?>" class="author">Föregående</a>
                            <a href="article.php?id=<?php echo $next; ?>" class="pubdate">Nästa</a>
                            <hr>
                            <br>


                                <h1 class="start-headline"><?php echo $res[0]["title"]; ?></h1>
                                <br><br>


                            <span class="author"><?php echo (isset($res[0]["author"]) ? $res[0]["author"] : "okänd"); ?></span>
                            <span class="pubdate"><?php echo $res[0]["category"] . ", " . $res[0]["pubdate"]; ?></span>
                            <?php echo $res[0]["content"]; ?>
                            <br>
                            <hr>
                            <p>Relaterade bilder:</p>


                <div class="pic-holder left"><img class="article-thumb" alt="bild relaterad till artikel" src="img/250x250/<?php echo $articleIMG[0][0] ?>"></div>
                <div class="pic-holder left"><img class="article-thumb" alt="bild relaterad till artikel" src="img/250x250/<?php echo $articleIMG[1][0] ?>"></div>
                <div class="pic-holder left"><img class="article-thumb" alt="bild relaterad till artikel" src="img/250x250/<?php echo $articleIMG[2][0] ?>"></div>

            </div>
        </div>


<?php include "include/footer.php"; ?>
