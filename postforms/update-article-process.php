<?php
include "../include/config.php";
// Check if form posted and get incoming
if (isset($_POST['update'])) {
    // Store posted form in parameter array
    $id       = $_POST['id'];
    $title    = $_POST['title'];
    $category = $_POST['category'];
    $content  = $_POST['content'];
    $author   = $_POST['author'];
    $pubdate  = $_POST['pubdate'];


    $params = [$title, $category, $content, $author, $pubdate, $id];
}
// Connect to the database
$db = connectToDB(DSN);

// Prepare SQL statement to UPDATE a row in the table
$sql = <<<EOD
UPDATE Article
SET
    title = ?,
    category = ?,
    content = ?,
    author = ?,
    pubdate = ?
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
