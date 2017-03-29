<?php
include("../include/config.php");
$db = connectToDB(DSN);

// Check if form posted and get incoming
if (isset($_POST['delete'])) {
    // Store posted form in parameter array
    $title  = $_POST['title'];
    $params = [$title];

}


// Prepare SQL statement to INSERT new rows into table
$sql = <<<EOD
DELETE FROM Object
WHERE
    title = ?
EOD;
$stmt = $db->prepare($sql);

try {
    $stmt->execute($params);
} catch (PDOException $e) {
    throw $e;
}

header("Location: $_SERVER[HTTP_REFERER]");
