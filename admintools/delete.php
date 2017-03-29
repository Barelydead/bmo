<h2>Delete Object</h2>

<?php $object = fetchObjectTitle();
      $article = fetchAllArticleTitle();
?>


    <form method="post" action="postforms/delete-object-process.php">
        <select name="title">
<php
    <?php foreach ($object as $array) {
        foreach ($array as $value) {
            echo '<option value="' . $value . '">' . $value;
        }
}
?>
        <select>
    <input type="submit" name="delete" value="delete"><br><br>
</form><br>

<h2>Delete article</h2>



    <form method="post" action="postforms/delete-article-process.php">
        <select name="title">
<php
    <?php foreach ($article as $array) {
        foreach ($array as $value) {
            echo '<option value="' . $value . '">' . $value;
        }
}
?>
        <select>
    <input type="submit" name="delete" value="delete"><br><br>
    </form>
