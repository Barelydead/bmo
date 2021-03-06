<?php
include("../include/config.php");
// Check if form posted and get incoming
if (isset($_POST['add'])) {
    // Store posted form in parameter array
    $id       = $_POST['id'];
    $title    = $_POST['title'];
    $category = $_POST['category'];
    $text     = $_POST['text'];
    $image    = $_POST['image'];
    $owner    = $_POST['owner'];


    $params = [$id, $title, $category, $text, $image, $owner];
}
// Connect to the database
$db = connectToDB(DSN);

// Prepare SQL statement to INSERT new rows into table
$sql = "INSERT INTO Object VALUES(?, ?, ?, ?, ?, ?)";
$stmt = $db->prepare($sql);


try {
    $stmt->execute($params);
} catch (PDOException $e) {
    throw $e;
}

header("Location: $_SERVER[HTTP_REFERER]");
