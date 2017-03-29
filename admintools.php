<?php include "include/adminconfig.php";
$active = "admin";
include "include/header.php";


if (getLoggedInUser() === false) {
    die("Du måste vara inloggad för att se denna sidan. <a href='admin.php'>Gå till inloggningssidan</a>");
};

// Get the selected page, or the default one
$page = (isset($_GET['page'])) ? $_GET['page'] : "intro";


// Where are the content-files
$dir  = __DIR__ . "/admintools";



// Array with all valid pages
$multipage = [
    "intro"   =>       "intro.php",
    "delete"  =>       "delete.php",
    "create"  =>       "create.php",
    "updatearticle"  =>       "updatearticle.php",
    "updateobject"  =>       "updateobject.php",
    "logout"        =>      "logout.php"
];



// Get the contentfile to include
if (isset($multipage[$page])) {
    $file = $multipage[$page];
} else {
    die("The value of ?page=" . htmlentities($page) . " is not recognized as a valid page.");
}

?>
        <h1 class="rubrik">Admin</h1>


    <div class="left-div">
        <aside><?php include("$dir/aside.php") ?></aside>
    </div>
    <div class="right-div">
        <?php include("$dir/$file") ?>
    </div>
</article>
<?php include("include/footer.php"); ?>
