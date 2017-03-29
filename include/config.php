<?php
$name = substr(preg_replace('/[^a-z\d]/i', '', __DIR__), -30);
session_name($name);
session_start();

// DNS constant
define("DSN", "sqlite:" . __DIR__ . "/../db/bmo2.sqlite");


function connectToDB($dsn)
{

    // Open the database file and catch the exception it it fails.
    try {
        $db = new PDO($dsn);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        echo "Failed to connect to the database using DSN:<br>$dsn<br>";
        throw $e;
    }

}

function fetchFullArticle($articleID)
{
    global $db;
    $sql = "SELECT * FROM Article WHERE category = 'article' AND id = $articleID";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $res = $stmt->fetchALL(PDO::FETCH_ASSOC);

    return $res;
}

function fetchFullObject($objectID, $kategori)
{
    global $db;
    $sql = "SELECT * FROM Object WHERE id = $objectID AND (category LIKE '%$kategori')";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $res = $stmt->fetchALL(PDO::FETCH_ASSOC);

    return $res;
}

function fetchIdBasedOnCategory($kategori)
{
    global $db;
    $sql = "SELECT id FROM Object WHERE (category LIKE '%$kategori')";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $res = $stmt->fetchALL(PDO::FETCH_ASSOC);

    return $res;
}

function fetchArticleTitle()
{
    global $db;
    $sql = "SELECT title,id FROM Article WHERE category = 'article'";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $res = $stmt->fetchALL(PDO::FETCH_ASSOC);

    return $res;
}

function fetchAllArticleTitle()
{
    global $db;
    $sql = "SELECT title FROM Article";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $res = $stmt->fetchALL(PDO::FETCH_ASSOC);

    return $res;
}

function fetchObjectTitle()
{
    global $db;
    $sql = "SELECT title FROM Object";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $res = $stmt->fetchALL(PDO::FETCH_ASSOC);

    return $res;
}

function fetchImageSrcBasedOnCategory($kategori)
{
    global $db;
    $sql = "SELECT * FROM Object WHERE (category LIKE '%$kategori')";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $res = $stmt->fetchALL(PDO::FETCH_ASSOC);

    return $res;
}

function fetchArticleImage($category)
{
    global $db;
    $sql = "SELECT image FROM Object WHERE (category = '$category')";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $res = $stmt->fetchALL(PDO::FETCH_NUM);

    return $res;
}

function fetchImageSrc()
{
    global $db;
    $sql = "SELECT image FROM Object";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $res = $stmt->fetchALL(PDO::FETCH_ASSOC);

    return $res;
}

function fetchAbout()
{
    global $db;
    $sql = "SELECT * FROM Article WHERE category = 'about'";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $res = $stmt->fetchALL(PDO::FETCH_ASSOC);

    return $res;
}



function fetchMaggy()
{
    global $db;
    $sql = "SELECT * FROM article WHERE category = 'maggy'";
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $res = $stmt->fetchALL(PDO::FETCH_ASSOC);

    return $res;
}

function categoryBasedOnArticle($articleTitle)
{
    $category = null;
    if ($articleTitle == "Begravningsfest och Gravöl - ett stort kalas") {
        $category = "Begravningsfest";
    } elseif ($articleTitle == "Begravningskonfekt") {
        $category = "Begravningskonfekt";
    } elseif ($articleTitle == "Minnestavlor") {
        $category = "Minnestavla";
    } elseif ($articleTitle == "Pärlkransar") {
        $category = "Pärlkrans";
    } return $category;
}

function fetchAll($sqlPhrase)
{
    global $db;
    $sql = $sqlPhrase;
    $stmt = $db->prepare($sql);

    $stmt->execute();
    $res = $stmt->fetchALL(PDO::FETCH_ASSOC);

    return $res;
}
