<?php
include("../include/config.php");
// Check if form posted and get incoming
if (isset($_POST['update'])) {
    // Store posted form in parameter array
    $id       = $_POST['id'];
    $title    = $_POST['title'];
    $category = $_POST['category'];
    $text     = $_POST['text'];
    $image    = $_POST['image'];
    $owner    = $_POST['owner'];


    $params = [$title, $category, $text, $image, $owner, $id];
}
// Connect to the database
$db = connectToDB(DSN);
print_r($params);

// Prepare SQL statement to UPDATE a row in the table
$sql = <<<EOD
UPDATE Object
SET
    title = ?,
    category = ?,
    text = ?,
    image = ?,
    owner = ?
WHERE
    id = ?
EOD;
$stmt = $db->prepare($sql);


try {
    $stmt->execute($params);
} catch (PDOException $e) {
    throw $e;
}

header("Location: $_SERVER[HTTP_REFERER]");
