<?php
$object = fetchObjectTitle();
$article = fetchAllArticleTitle();
?>

<h2>Update article</h2>



<form>
    <select name="articleTitle">
<php
<?php foreach ($article as $array) {
    foreach ($array as $value) {
        echo '<option value="' . $value . '">' . $value;
    }
}
?>
    <select>
<input type="hidden" name="page" value="updatearticle">
<input type="submit" value="välj"><br><br>
</form>


<?php

$title = isset($_GET['articleTitle'])
    ? $_GET['articleTitle']
    : null;

$id       = null;
$category = null;
$content  = null;
$author   = null;
$pubdate  = null;

if ($title) {
    // Get details on the boat using specified jettyPosition
    $sql = "SELECT * FROM Article WHERE title = ?";
    $stmt = $db->prepare($sql);
    $params = [$title];
    $stmt->execute($params);
    // Get the results as an array with column names as array keys
    $res = $stmt->fetchAll(PDO::FETCH_BOTH);

    if (empty($res)) {
        die("No such title");
    }
    // Move content of array to individual variables, for ease of use.
    list($id, $category, $title, $content, $author, $pubdate) = $res[0];

}
?>
<form method="post" action="postforms/update-article-process.php" id="update">
    <fieldset>
        <legend>Add Artikle</legend>
        <p><label>ID<br><input type="number" name="id" value="<?=$id?>" readonly></label></p>
        <p><label>Title<br><input type="text" name="title" value="<?=$title?>"></label></p>
        <p><label>Category<br><input type="text" name="category" value="<?=$category?>"></label></p>
        <p><label>Content<br><textarea name="content" form="update"><?=$content?></textarea></label></p>
        <p><label>Author<br><input type="text" name="author" value="<?=$author?>"></label></p>
        <p><label>Publish date<br><input type="text" name="pubdate" value="<?=$pubdate?>"></label></p>
        <p><input type="submit" name="update" value="Update"></p>
    </fieldset>
</form>
<?php
