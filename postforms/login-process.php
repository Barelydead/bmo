<?php
// Include common details
include "../include/config.php";
include "../include/adminconfig.php";



// Check if form is submitted and try to login user
$submitted = getPostValueFor('login', false);

if ($submitted !== false) {
    $user     = getPostValueFor('user', null);
    $password = getPostValueFor('password', null);
    $success  = loginUser($user, $password);

    if ($success === true) {
        header("Location: ../admintools.php");
        exit;
    }
}


// Failed to login, redirect to login-page again.
header("Location: ../admin.php");
