<?php
$object = fetchObjectTitle();
?>

<h2>Update Object</h2>



<form>
    <select name="objectTitle">
<php
<?php foreach ($object as $array) {
    foreach ($array as $value) {
        echo '<option value="' . $value . '">' . $value;
    }
}
?>
    <select>
<input type="hidden" name="page" value="updateobject">
<input type="submit" value="välj"><br><br>
</form>


<?php

$title = isset($_GET['objectTitle'])
    ? $_GET['objectTitle']
    : null;

$id       = null;
$category = null;
$text  = null;
$image   = null;
$owner  = null;

if ($title) {
    // Get details on the boat using specified jettyPosition
    $sql = "SELECT * FROM Object WHERE title = ?";
    $stmt = $db->prepare($sql);
    $params = [$title];
    $stmt->execute($params);
    // Get the results as an array with column names as array keys
    $res = $stmt->fetchAll(PDO::FETCH_BOTH);

    if (empty($res)) {
        die("No such title");
    }
    // Move content of array to individual variables, for ease of use.
    list($id, $title, $category, $text, $image, $owner) = $res[0];

}
?>
<form method="post" action="postforms/update-object-process.php" id="update">
    <fieldset>
        <legend>Update object</legend>
        <p><label>ID<br><input type="number" name="id" value="<?=$id?>" readonly></label></p>
        <p><label>Title<br><input type="text" name="title" value="<?=$title?>"></label></p>
        <p><label>Category<br><input type="text" name="category" value="<?=$category?>"></label></p>
        <p><label>Text<br><textarea name="text" form="update"><?=$text?></textarea></label></p>
        <p><label>Image<br><input type="text" name="image" value="<?=$image?>"></label></p>
        <p><label>Owner<br><input type="text" name="owner" value="<?=$owner?>"></label></p>
        <p><input type="submit" name="update" value="Update"></p>
    </fieldset>
</form>


<?php
