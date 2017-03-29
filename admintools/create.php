<h2>Add article or object</h2>

    <form>
        <select name="select">
            <option value="article">Article
            <option value="object">Object
        <select>
    <input type="submit" name="page" value="create"><br><br>
    </form>

<?php
$dropdown = isset($_GET['select']) ? $_GET['select'] : null;

if ($dropdown == "article") {
    echo <<<EOD
<form method="post" action="postforms/insert-article-process.php" id="insert">
    <fieldset>
        <legend>Add Artikle</legend>
        <p><label>ID<br><input type="number" name="id"></label></p>
        <p><label>Title<br><input type="text" name="title"></label></p>
        <p><label>Category<br><input type="text" name="category"></label></p>
        <p><label>Content<br><textarea name="content" form="insert"></textarea></label></p>
        <p><label>Author<br><input type="text" name="Author"></label></p>
        <p><label>Publish date<br><input type="text" name="pubdate"></label></p>
        <p><input type="submit" name="add" value="Add"></p>
    </fieldset>
</form>
EOD;
} elseif ($dropdown == "object") {
    echo <<<EOD
<form method="post" action="postforms/insert-object-process.php" id="insert">
    <fieldset>
        <legend>Add Artikle</legend>
        <p><label>ID<br><input type="number" name="id"></label></p>
        <p><label>Title<br><input type="text" name="title"></label></p>
        <p><label>Category<br><input type="text" name="category"></label></p>
        <p><label>Text<br><textarea name="text" form="insert"></textarea></label></p>
        <p><label>Image<br><input type="text" name="image"></label></p>
        <p><label>Owner<br><input type="text" name="owner"></label></p>
        <p><input type="submit" name="add" value="Add"></p>
    </fieldset>
</form>
EOD;
} else {
    echo "Välj om du vill lägga till en artikel eller ett objekt";
}

?>
