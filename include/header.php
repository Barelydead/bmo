<?php
include("config.php");
?>
<!doctype html>
<?php
$db = connectToDB(DSN);


?>


<html lang="sv">
<head>
    <meta charset="utf-8">
    <title>BMO</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel='shortcut icon' href="img/header/idea.png">
    <link href="https://fonts.googleapis.com/css?family=Lato%7CRaleway" rel="stylesheet">
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=2.0;">
</head>

<body>

    <header class="site-header">
        <div class="header-wrap">
            <div class="header-logo left">
            <img src="img/header/idea.png" alt="sitelogo" class="site-logo">
            </div>
            <div class="header-text left">
            <h2 class="site-title">Begravningsmuseum Online</h2>
            <span class="title-ingress">Folkbildning för alla åldrar.</span>
            </div>
        </div>
    </header>



    <div class="navbar-wrap">
        <div class="navbar-div">
        <nav class="navbar">
        <a href="bmo.php" class="a-navbar"><div class="<?php echo ($active == "home" ? "active" : "button"); ?> left">Hem</div></a>
        <a href="article.php" class="a-navbar"><div class="<?php echo ($active == "article" ? "active" : "button"); ?> left">Artiklar</div></a>
        <a href="objects.php" class="a-navbar"><div class="<?php echo ($active == "objects" ? "active" : "button"); ?> left">Objekt</div></a>
        <a href="maggy.php" class="a-navbar"><div class="<?php echo ($active == "maggy" ? "active" : "button"); ?> left">Seder och bruk</div></a>
        <a href="search.php" class="a-navbar"><div class="<?php echo ($active == "search" ? "active" : "button"); ?> left">Sök sida</div></a>
        <a href="about.php" class="a-navbar"><div class="<?php echo ($active == "about" ? "active" : "button"); ?> left">Om</div></a>
        </nav>
    </div>
    </div>
