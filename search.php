<?php
$active = "search";
include "include/header.php";


$search = isset($_GET['search'])
    ? "%" . $_GET['search'] . "%"
    : null;
?>


<div class="main-wrap">

    <div class="left-div">
    </div>

    <div class="right-div">

            <h1 class="start-headline">Sök</h1>

            <form>
                <input type="search" name="search" value="<?=strtolower(htmlentities(trim($search, "%")))?>">
                <input type="submit" value="Search">
            </form>

<?php
// Break script if empty $search
if (is_null($search) || $search == "") {
    echo('<p class="bread">Du kan söka på innehåll i artiklar, författare och ägare mm.');
} else {

    // Prepare the SQL statement
    $sql = "SELECT * FROM Article WHERE content LIKE ? OR title LIKE ? OR author LIKE ?";
    $stmt = $db->prepare($sql);


    // Execute the SQL statement using parameters to replace the ?
    $params = [$search, $search, $search];
    $stmt->execute($params);

    $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare the SQL statement
    $sql = "SELECT * FROM Object WHERE 'text' LIKE ? OR title LIKE ? OR owner LIKE ?";
    $stmt = $db->prepare($sql);


    // Execute the SQL statement using parameters to replace the ?
    $params = [$search, $search, $search];
    $stmt->execute($params);

    $objects = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<h2>Artiklar</h2>";
    if ($articles) {
        foreach ($articles as $value) {
            if ($value['id'] == 5) {
                $page = "maggy.php";
            } elseif ($value['id'] == 6) {
                $page = "about.php";
            } elseif ($value['id'] == 7) {
                $page = "bmo.php";
            } else {
                $page = "article.php";
            }
            echo "<a href='" . $page . "?id=" . $value['id'] . "'>" . $value['title'] . "</a><br>";
        }
    } else {
        echo "<p>Vi hittade ingen artikel med innehållet: " . htmlentities(trim($search, "%")) . "</p>";
    }


    echo "<h2>Objekt</h2>";
    if ($objects) {
        foreach ($objects as $key => $value) {
            echo "<a href='objects.php?id=" . $value['id'] . "'>" . $value['title'] . "</a><br>";
        }
    } else {
        echo "<p>Vi hittade ingen objekt med innehållet: " . htmlentities(trim($search, "%")) . "</p>";
    }
}
?>





    </div>

</div>


<?php include "include/footer.php"; ?>
