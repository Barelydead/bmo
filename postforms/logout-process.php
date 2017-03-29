<?php
// Include common details
include "../include/config.php";
include "../include/adminconfig.php";


// Check if form is submitted and try to login user
$submitted = getPostValueFor('logout', false);

if ($submitted !== false) {
    logoutUser();
    header("Location: ../article.php");
    exit;
}



// Error condition, should not really come here if the form is okey.
header($_SERVER['HTTP_REFERER']);
